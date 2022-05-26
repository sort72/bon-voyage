<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\UserController;
use App\Models\Flight;
use Carbon\Carbon;
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

Route::as('external.')->group(function(){
    Route::middleware(['validate_client_guest'])->group(function() {
        Route::get('/', function () {
            $flights = Flight::with('destination.city','origin.city')->where('departure_time','>',Carbon::now())->get();
            return view('welcome',compact('flights'));
        })->name('index');


        Route::get('/vuelos', [ExternalController::class, 'flights'])->name('flights');

        Route::get('/reservar-citas', [ExternalController::class, 'activeBookings']);

        Route::get('/checkin', [ExternalController::class, 'checkin'])->name('checkin');
        Route::post('/checkin', [ExternalController::class, 'validateCheckin'])->name('validate-checkin');
        Route::get('/checkin/cambio-silla', [ExternalController::class, 'changeSeat'])->name('change-seat');
    });

    Route::middleware(['auth', 'role:client'])->group(function() {

        Route::get('/reservar', [ExternalController::class, 'booking'])->name('booking');
        Route::post('/reservar-datos', [ExternalController::class, 'bookingData'])->name('booking-data');

        Route::get('/comprar', [ExternalController::class, 'purchase'])->name('purchase');
        Route::post('/comprar', [ExternalController::class, 'purchaseData'])->name('purchase-data');

        Route::as('profile.')->prefix('perfil')->group(function() {
        Route::get('/editar-perfil', [UserController::class, 'editProfile'])->name('edit');
        Route::patch('/editar-perfil', [UserController::class, 'updateProfile'])->name('update');

        Route::get('/reservas', [UserController::class, 'bookingList'])->name('booking-list');
        Route::get('/compras', [UserController::class, 'purchasesList'])->name('purchases-list');
        Route::get('/carrito', [UserController::class, 'cart'])->name('cart');
        Route::get('/conversaciones', [ConversationController::class, 'conversation'])->name('conversation.index');
        Route::get('/conversaciones/crear', [ConversationController::class, 'conversation'])->name('conversation.create');
        Route::post('/conversaciones/crear', [ConversationController::class, 'conversation'])->name('conversation.store');
        Route::get('/conversaciones/{conversation}', [ConversationController::class, 'conversation'])->name('conversation.show');
        Route::post('/conversaciones/{conversation}', [ConversationController::class, 'conversation'])->name('conversation.new-message');

        Route::resource('card', CardController::class);
        });

        Route::get('/responder-mensaje', [UserController::class, 'replyMessage'])->name('reply-mesaage');
    });
});


Route::middleware(['auth', 'role:root,admin'])->as('dashboard.')->prefix('dashboard')->group(function() {

    Route::get('/', function () {
        return view('dashboard');
    })->name('index');



    Route::middleware(['role:root'])->group(function() {
        Route::get('administrator', [RootController::class, 'listAdmin'] )->name('list-admin');
        Route::get('crear-administrador', [RootController::class, 'createAdmin'] )->name('create-admin');
        Route::post('crear-administrador', [RootController::class, 'storeAdmin'] )->name('store-admin');
    });

    Route::middleware(['role:admin'])->group(function() {
        Route::resource('destination', DestinationController::class);
        Route::resource('flight', FlightController::class);
        Route::resource('inbox', DestinationController::class);
    });



});


require __DIR__.'/auth.php';


