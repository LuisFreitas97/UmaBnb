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

Route::get('/extras', function () {
    return App\Extra::all();
});

Route::get('/typologies', function () {
    return App\Typology::all();
});

Route::get('/genderRules', function () {
    return App\GenderRule::all();
});

Route::get('/stuffingItems', function () {
    return App\StuffingItem::all();
});

Route::get('/advertismentTypes', function () {
    return App\AdvertisementType::all();
});

Route::get('/advertisements', function () {
    return App\Advertisement::all();
});

Route::get('/userTypes', function () {
    return App\UserType::all();
});
