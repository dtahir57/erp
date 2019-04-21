<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function() {
    Route::post('/resto', 'RestaurantController@store');
});

Route::post('item/save', 'MenuController@saveMenuItem');

Route::group(['middleware' => 'cors'], function () {
	/**
	 * PermissionController routes starts here
	 */
	Route::get('/permissions', 'UserManagement\PermissionController@index')->name('permission.index');
	Route::get('/permission/create', 'UserManagement\PermissionController@create')->name('permission.create');
	Route::post('/permission', 'UserManagement\PermissionController@store')->name('permission.store');
	Route::get('/permission/{id}/edit', 'UserManagement\PermissionController@edit')->name('permission.edit');
	Route::patch('/permission/{id}', 'UserManagement\PermissionController@update')->name('permission.update');
	Route::delete('/permission/{id}', 'UserManagement\PermissionController@destroy')->name('permission.destroy');
	/**
	 * PermissionController routes ends here
	 */
	
	/**
	 * RoleController Routes starts from here
	 */
	Route::get('/roles', 'UserManagement\RoleController@index')->name('role.index');
	Route::get('/role/create', 'UserManagement\RoleController@create')->name('role.create');
	Route::post('/role', 'UserManagement\RoleController@store')->name('role.store');
	Route::get('/role/{id}/edit', 'UserManagement\RoleController@edit')->name('role.edit');
	Route::patch('/role/{id}', 'UserManagement\RoleController@update')->name('role.update');
	Route::delete('/role/{id}', 'UserManagement\RoleController@destroy')->name('role.destroy');
	/**
	 * RoleController Routes ends from here
	 */
	
	/**
	 * UserController Routes starts from here
	 */
	Route::get('/users', 'UserManagement\UserController@index')->name('user.index');
	Route::post('/user', 'UserManagement\UserController@store');
	Route::get('/user/{id}/edit', 'UserManagement\UserController@edit');
	Route::patch('/user/{id}', 'UserManagement\UserController@update');
	Route::delete('/user/{id}', 'UserManagement\UserController@destroy');
	/**
	 * UserController Routes  ends here
	 */
});