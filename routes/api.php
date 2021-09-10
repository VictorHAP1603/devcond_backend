<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function() {
    return ['pong' => true];
});

Route::get('/401', 'AuthController@unauthorized')->name('login');

Route::post('/auth/login', 'AuthController@login');
Route::post('/auth/register', 'AuthController@register');

Route::middleware('auth:api')->group(function() {
    Route::post('/auth/validate', 'AuthController@validate');
    Route::post('/auth/logout', 'AuthController@logout');

    // Mural de Avisos
    Route::get('/walls', 'WallController@getAll');
    Route::post('/wall/{id}/like', 'WallController@like');

    // Documentos
    Route::get('/docs', 'DocController@getAll');

    // Livro de Ocorrencias
    Route::get('/warnings', 'WarningController@getMyWarnings');
    Route::post('/warning', 'WarningController@setWarning');
    Route::post('/warning/file', 'WarningController@addWarningFile');

    // Boletos
    Route::get('/billets', 'BilletController@getAll');

    // Achados e Perdidos
    Route::get('/found-and-losts', 'FoundAndLostController@getAll');
    Route::post('/found-and-lost', 'FoundAndLostController@insert');
    Route::put('/found-and-losts/{id}', 'FoundAndLostController@update');

    // Unidade
    Route::get('/unit/{id}', 'UnitController@getInfo');

    Route::post('/unit/{id}/addperson', 'UnitController@addPerson');
    Route::delete('/unit/{id}/removeperson', 'UnitController@removePerson');

    Route::post('/unit/{id}/addvehicle', 'UnitController@addVehicle');
    Route::delete('/unit/{id}/addvehicle', 'UnitController@removeVehicle');

    Route::post('/unit/{id}/addpet', 'UnitController@addPet');
    Route::post('/unit/{id}/removepet', 'UnitController@removePet');

    // Reservas
    Route::get('/reservations', 'ReservationController@getReservations');

    Route::get('/my-reservations', 'ReservationController@getMyReservations');
    Route::delete('/my-reservation', 'ReservationController@removeMyReservation');
    Route::post('/reservation/{id}', 'ReservationController@setReservation');

    Route::get('/reservation/{id}/disableddates', 'ReservationController@getDisabledDates');
    Route::get('/reservation/{id}/times', 'ReservationController@getTimes');



});
