<?php

use App\Http\Controllers\ExternalController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cancelar-reservas-expiradas', [ExternalController::class, 'cancelExpired'])->name('api.cancel-expired');

Route::get('test-send-boarding/{ticket}', [ExternalController::class, 'testBoardingPass'])->name('api.test-boarding-pass');
