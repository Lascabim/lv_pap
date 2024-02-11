<?php

use App\Http\Controllers\Api\AbilityController;
use App\Http\Controllers\Api\RaceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [UserController::class, 'createUser']);
Route::post('/login', [UserController::class, 'loginUser']);
Route::post('/updatePhoto', [UserController::class, 'updatePhoto'])->middleware('auth:sanctum');
Route::post('/updateCred', [UserController::class, 'updateCred'])->middleware('auth:sanctum');
Route::post('/updateData', [UserController::class, 'updateData'])->middleware('auth:sanctum');

Route::get('/getUser', [UserController::class, 'getUser'])->middleware('auth:sanctum');
Route::get('/checkToken', [UserController::class, 'checkToken'])->middleware('auth:sanctum');
Route::get('/getAbilities', [AbilityController::class, 'getAbilities'])->middleware('auth:sanctum');

Route::post('/createRace', [RaceController::class, 'createRace'])->middleware('auth:sanctum');
Route::get('/races', [RaceController::class, 'getRaces']);
