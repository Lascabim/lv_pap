<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'loadHomePage']);
Route::get('/home', [Controller::class, 'loadHomePage'])->name('home');
Route::get('/welcome', [Controller::class, 'loadHomePage'])->name('welcome');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/faq#runner_type', function () {
    return view('faq');
})->name('faq/runner_type');

Route::get('/faq#condition', function () {
    return view('faq');
})->name('faq/condition');

Route::get('/create_races', function () {
    return view('races.race_creation');
})->name('create_races')->middleware('can:create_races');

Route::get('/races', [RaceController::class, 'getRaces'])->name('races');
Route::get('/race/{name}', [RaceController::class, 'getSpecificRace'])->name('race');
Route::get('/join_race/{race_id}/{user}', [RaceController::class, 'joinRace'])->name('join_race');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// EMAIL VERIFICATION

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
