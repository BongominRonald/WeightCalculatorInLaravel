<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Request::setTrustedProxies(
            ['*'],
            Request::HEADER_X_FORWARDED_FOR |
            Request::HEADER_X_FORWARDED_HOST |
            Request::HEADER_X_FORWARDED_PORT |
            Request::HEADER_X_FORWARDED_PROTO
        );

        $this->app->booted(function () {
            $host = request()->header('x-forwarded-host');
            if ($host) {
                $scheme = in_array(request()->header('x-forwarded-proto'), ['https', 'on', 'ssl']) ? 'https' : 'http';
                URL::forceScheme($scheme);
                URL::forceRootUrl($scheme.'://'.$host);
            }
        });
    }
}
