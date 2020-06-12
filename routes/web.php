<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * Authentication routes
 */
Route::group(['prefix' => 'auth'], function (){

   Auth::routes(['verify' => true]);

   Route::namespace('Auth')->group(function (){

       Route::get('logout/other-devices', [
           'uses' => 'LoginController@showLogoutOtherDevicesForm',
           'as' => 'logout.other-devices'
       ]);

       Route::post('logout/other-devices', [
           'uses' => 'LoginController@logoutOtherDevices',
           'as' => 'logout.other-devices.post'
       ]);
   });
});

/**
 * Front routes
 */
Route::namespace('Front')->name('front.')->group(function (){

    Route::get('/', [
        'uses' => 'PageController@home',
        'as' => 'home'
    ]);

    Route::get('/members', [
        'uses' => 'MemberController@index',
        'as' => 'members.index'
    ]);

    Route::get('members/{username}', [
        'uses' => 'MemberController@details',
        'as' => 'members.details'
    ]);

    Route::group(['prefix' => 'client-area', 'middleware' => ['auth', 'auth_front', 'verified']], function (){

        Route::get('profile/edit', [
            'uses' => 'ProfileController@edit',
            'as' => 'profile.edit'
        ]);

        Route::post('profile/update', [
            'uses' => 'ProfileController@update',
            'as' => 'profile.update'
        ]);

        Route::get('agenda', [
            'uses' => 'AgendaController@index',
            'as' => 'agenda.index'
        ]);

        Route::get('agenda/data', [
            'uses' => 'AgendaController@data',
            'as' => 'agenda.data'
        ]);

        Route::post('agenda/request/{id}', [
            'uses' => 'AgendaController@requestMeeting',
            'as' => 'agenda.request'
        ]);

        Route::post('agenda/store', [
            'uses' => 'AgendaController@store',
            'as' => 'agenda.store'
        ]);

        Route::get('agenda/get/{id}', [
            'uses' => 'AgendaController@getEvent',
            'as' => 'agenda.get'
        ]);

        Route::post('agenda/update/{id}', [
            'uses' => 'AgendaController@update',
            'as' => 'agenda.update'
        ]);

        Route::post('agenda/confirm/{id}', [
            'uses' => 'AgendaController@confirm',
            'as' => 'agenda.confirm'
        ]);

        Route::post('agenda/cancel/{id}', [
            'uses' => 'AgendaController@cancel',
            'as' => 'agenda.cancel'
        ]);

        Route::post('agenda/delete/{id}', [
            'uses' => 'AgendaController@destroy',
            'as' => 'agenda.delete'
        ]);

    });
});

/**
 * Administration routes
 */
Route::namespace('Back')->middleware(['auth', 'auth_back'])->name('back.')->prefix('administration')->group(function (){

    Route::get('/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard.index'
    ]);

    Route::get('/users', [
        'uses' => 'UserController@index',
        'as' => 'users.index'
    ]);

    Route::post('/users/ban/{id}', [
        'uses' => 'UserController@ban',
        'as' => 'users.ban'
    ]);

    Route::post('/users/unban/{id}', [
        'uses' => 'UserController@unBan',
        'as' => 'users.unban'
    ]);

    Route::post('/users/delete/{id}', [
        'uses' => 'UserController@delete',
        'as' => 'users.delete'
    ]);
});
