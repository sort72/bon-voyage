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
        Route::post('crear-administrador', [RootController::class, 'storeAdmin'] )->name('store-admin');
    });

    Route::middleware(['role:admin'])->group(function() {
        Route::resource('destination', DestinationController::class);
        Route::resource('flight', FlightController::class);
        Route::resource('inbox', DestinationController::class);
    });



});

Route::group(['prefix' => Config::get('location.routes.prefix'), 'namespace' => 'App\Http\Controllers', 'middleware' => [Config::get('location.routes.middleware')]], function () {
    # Get all Countries
    Route::get('countries', 'LocationController@getCountries');

    # Get a Country by its ID
    Route::get('country/{id}', 'LocationController@getCountry');

    # Get all States
    Route::get('states', 'LocationController@getStates');

    # Get a State by its ID
    Route::get('state/{id}', 'LocationController@getState');

    # Get all States in a Country using the Country ID
    Route::get('states/{countryId}', 'LocationController@getStatesByCountry');

    # Get all Cities
    Route::get('cities', 'LocationController@getCities');

    # Get a City by its ID
    Route::get('city/{id}', 'LocationController@getCity');

    # Get all Cities in a State using the State ID
    Route::get('cities/{stateId}', 'LocationController@getCitiesByStates');

    # Get all Cities in a Country using the Country ID
    Route::get('country-cities/{countryId}', 'LocationController@getCitiesByCountry');
});



require __DIR__.'/auth.php';
