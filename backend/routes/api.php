<?php

use Illuminate\Http\Request;

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

Route::apiResource('hotelDetails', 'API\HotelDetailsController');

Route::apiResource('booking', 'API\BookingController');

Route::apiResource('priceList', 'API\PriceListController');

Route::apiResource('room', 'API\RoomController');

Route::apiResource('roomType', 'API\RoomTypeController');