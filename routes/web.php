<?php

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

Route::get('/','AdvertisementsController@destaques');

Auth::routes();
Route::get('/anuncios', 'AdvertisementsController@listarAnuncios');
Route::get('/filtrarAnuncios', 'AdvertisementsController@filtrarAnuncios');
Route::get('/anuncios/{id}', 'AdvertisementsController@detailInfo');
// Rotas para as views
Route::middleware(['auth'])->group(function () {

    /***** GET *****/
    Route::get('/panel', 'PanelController@index')->name('panel');

    //Route::get('/inserirAnuncio', 'InserirAnuncioController@index')->name('inserirAnuncio');
    Route::get('/inserirAnuncio', 'AdvertisementsController@infoInserirAnuncio')->name('inserirAnuncio');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/myads', 'AdvertisementsController@index')->name('myads');

    //Route::post('/saveAnuncio','InserirAnuncioController@store');
    Route::post('/saveAnuncio', 'AdvertisementsController@inserirAnuncio');

    /***** PANEL *****/
    // > DESTROY
    Route::post('/panel/parishes/destroy/{id}', array('as' => 'parishes.destroy', 'uses' => 'ParishController@destroy'));
    Route::post('/panel/typos/destroy/{id}', array('as' => 'typos.destroy', 'uses' => 'TypologyController@destroy'));
    Route::post('/panel/extras/destroy/{id}', array('as' => 'extras.destroy', 'uses' => 'ExtraController@destroy'));
    Route::post('/panel/types/destroy/{id}', array('as' => 'types.destroy', 'uses' => 'AdvertisementTypeController@destroy'));
    Route::post('/panel/users/destroy/{id}', array('as' => 'users.destroy', 'uses' => 'UserController@destroy'));
    Route::post('/panel/grules/destroy/{id}', array('as' => 'grules.destroy', 'uses' => 'GenderRuleController@destroy'));
    Route::post('/panel/sitems/destroy/{id}', array('as' => 'sitems.destroy', 'uses' => 'StuffingItemController@destroy'));
    Route::post('/panel/ads/destroy/{id}', array('as' => 'ads.destroy', 'uses' => 'AdvertisementsController@destroy'));

    // STORE
    Route::post('/panel/parishes/store', array('as' => 'parishes.store', 'uses' => 'ParishController@store'));
    Route::post('/panel/typos/store', array('as' => 'typos.store', 'uses' => 'TypologyController@store'));
    Route::post('/panel/extras/store', array('as' => 'extras.store', 'uses' => 'ExtraController@store'));
    Route::post('/panel/types/store', array('as' => 'types.store', 'uses' => 'AdvertisementTypeController@store'));
    Route::post('/panel/grules/store', array('as' => 'grules.store', 'uses' => 'GenderRuleController@store'));
    Route::post('/panel/sitems/store', array('as' => 'sitems.store', 'uses' => 'StuffingItemController@store'));

    // > UPDATE
    // ...
    /********** **********/

    /***** PROFILE *****/
    // > DESTROY
    // ...

    // > STORE
    // ..

    // > UPDATE
    Route::post('/panel/users/update', array('as' => 'panel.users.update', 'uses' => 'PanelController@update'));
    Route::post('/profile/update', array('as' => 'profile.update', 'uses' => 'UserController@update'));
    /********* *********/

    /***** MEUS ANÚNCIOS *****/
    // > DESTROY
    Route::post('/myads/destroy/{id}', array('as' => 'myads.destroy', 'uses' => 'AdvertisementsController@destroy'));

    // > STORE
    // ...

    // > UPDATE
    // ...
    /********* *********/

});
