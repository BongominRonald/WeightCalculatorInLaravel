<?php

namespace Tests\Feature\Auth;

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered(): void
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->get('/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified(): void
    {
        $user = User::factory()->unverified()->create();

        Event::fake();

        // Create the controller and call it directly
        $controller = new VerifyEmailController;

        // Create a request object with the correct parameters
        $request = new EmailVerificationRequest;
        $request->setRouteResolver(function () use ($user) {
            return new Route('GET', '/verify-email/{id}/{hash}', [
                'id' => $user->id,
                'hash' => sha1($user->getEmailForVerification()),
            ]);
        });
        $request->setUserResolver(fn () => $user);
        $request->merge([
            'id' => $user->id,
            'hash' => sha1($user->getEmailForVerification()),
        ]);

        $response = $controller($request);

        $this->assertEquals(302, $response->getStatusCode());

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $this->assertStringContainsString('dashboard', $response->getTargetUrl());
        $this->assertStringContainsString('verified=1', $response->getTargetUrl());
    }

    public function test_email_is_not_verified_with_invalid_hash(): void
    {
        $user = User::factory()->unverified()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}
