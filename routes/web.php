<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('projects')->group(function () {
  Route::get('/', 'HomeController@projects')->name('projects');
  Route::get('/admin', 'HomeController@projectsAdmin')->name('projects.admin');
});


Route::get('/', function(){
  return view('welcome');
});

Route::get('/chats', 'HomeController@chats');

Route::get('messages', 'MessageController@fetchMessages');
Route::post('messages', 'MessageController@sendMessage');


// turbolinks
Route::get('/restos', 'RestaurantController@index')->name('restos');
Route::get('/restos/menu/{id}', 'MenuController@index')->name('restos.menu');


Route::get('/teams', 'TeamController@index')->name('teams');
Route::get('/tasks', 'TaskController@index')->name('tasks');
