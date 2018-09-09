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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    //routes for events
    Route::get('events', 'EventsController@index');
    Route::get('events/create', 'EventsController@create');
    Route::post('events/add', 'EventsController@store');
    Route::get('events/{id}/edit/','EventsController@edit');
    Route::match(['put', 'patch'], 'events/update/{id}','EventsController@update');
    Route::match(['delete'], 'events/delete/{id}','EventsController@destroy');
    
    Route::get('events/manage-events', 'EventsController@manageEvents');
    Route::post('events/assign-events', 'EventsController@assignEvents');
    
    //Admin pages routes
    Route::group(['middleware' => 'roles'], function () {

        Route::get('admin/roles', [
            'uses' => 'RoleController@index',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::get('admin/roles/create', [
            'uses' => 'RoleController@create',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::post('admin/roles/add', [
            'uses' => 'RoleController@store',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::get('admin/roles/{id}/edit/',[
            'uses' => 'RoleController@edit',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::match(['put', 'patch'], 'admin/roles/update/{id}',[
            'uses' => 'RoleController@update',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::match(['delete'], 'admin/roles/delete/{id}',[
            'uses' => 'RoleController@destroy',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        
        Route::post('/admin/assign-roles', [
            'uses' => 'RoleController@assignRoles',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::get('/admin/manage-roles', [
            'uses' => 'RoleController@manageRoles',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        
        Route::get('/admin/users/create', [
            'uses' => 'UserController@create',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        
        Route::get('/admin/users', [
            'uses' => 'UserController@index',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        
        Route::get('/admin/users/{id}/edit', [
            'uses' => 'UserController@edit',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::post('/admin/users/add',  [
            'uses' => 'UserController@store',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::match(['put', 'patch'], 'admin/users/update/{id}', [
            'uses' => 'UserController@update',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
        Route::match(['delete'], '/admin/users/delete/{id}', [
            'uses' => 'UserController@destroy',
            'middleware' => ['roles','auth'],
            'roles' => ['Admin']
        ]);
    });
});



