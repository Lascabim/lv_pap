<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RaceController;
use App\Models\Story;
use Illuminate\Support\Facades\Route;

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
    return view('race_creation');
})->name('create_races')->middleware('can:create_races');

Route::get('/races', [RaceController::class, 'getRaces'])->name('races');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
