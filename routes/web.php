<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\RootController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:root,admin'])->as('dashboard.')->prefix('dashboard')->group(function() {

    Route::get('/', function () {
        return view('dashboard');
    })->name('index');

    Route::middleware(['role:root'])->group(function() {
        Route::get('crear-administrador', [RootController::class, 'createAdmin'] )->name('create-admin');
    });

    Route::middleware(['role:admin'])->group(function() {
        Route::resource('destination', DestinationController::class);
        Route::resource('flight', FlightController::class);
        Route::resource('inbox', DestinationController::class);
    });



});



require __DIR__.'/auth.php';
