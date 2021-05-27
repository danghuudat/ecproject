<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/getlogin', [\App\Http\Controllers\UserController::class, 'getlogin'])->name('getlogin');
Route::get('user', [\App\Http\Controllers\UserController::class, 'index'])->middleware('auth');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});
Route::group([
    'prefix' => 'account'
], function ($router) {
    Route::get('/import', [\App\Http\Controllers\AccountController::class, 'import']);
    Route::get('/', [\App\Http\Controllers\AccountController::class, 'index']);
});
