<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/olevel-subjects', [DashboardController::class, 'olevelSubjects'])->name('olevel.subjects');
    Route::post('/olevel-subjects', [DashboardController::class, 'olevelSubjectsStore']);

    Route::get('/olevel-scores', [DashboardController::class, 'olevelScores'])->name('olevel.scores');
    Route::post('/olevel-scores', [DashboardController::class, 'olevelScoresStore']);

    Route::get('/alevel-subjects', [DashboardController::class, 'alevelSubjects'])->name('alevel.subjects');
    Route::post('/alevel-subjects', [DashboardController::class, 'alevelSubjectsStore']);

    Route::get('/alevel-scores', [DashboardController::class, 'alevelScores'])->name('alevel.scores');
    Route::post('/alevel-scores', [DashboardController::class, 'alevelScoresStore']);

    Route::get('/weight', [DashboardController::class, 'weight'])->name('weight');
    Route::post('/weight', [DashboardController::class, 'weightStore']);

    Route::get('/view', [DashboardController::class, 'view'])->name('view');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::view('/mail-success', 'mail-success')->name('mail-success');
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/ads.txt', function () {
    return response("google.com, pub-2252067205687343, DIRECT, f08c47fec0942fa0\n", 200, [
        'Content-Type' => 'text/plain',
    ]);
});

require __DIR__.'/auth.php';
