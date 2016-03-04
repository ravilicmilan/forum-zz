<?php

Route::group(['middleware' => 'admin'], function() {
	Route::resource('backend/users', 'Backend\UsersController', ['except' => ['show']]);
	Route::resource('backend/categories', 'Backend\CategoriesController', ['except' => ['show']]);
	Route::resource('backend/topics', 'Backend\TopicsController', ['except' => ['show']]);
	Route::resource('backend/comments', 'Backend\CommentsController', ['except' => ['show']]);
	Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('topics/create', 'TopicsController@getCreate');
Route::get('topics/search', 'TopicsController@getSearch');
Route::post('topics/create', 'TopicsController@postCreate');
Route::get('topics/{slug}', 'TopicsController@getShow');
Route::get('topics/edit/{id}', 'TopicsController@getEdit');
Route::post('topics/edit/{id}', 'TopicsController@postEdit');


Route::get('users/me/edit', 'UsersController@getEdit');
Route::post('users/me/edit', 'UsersController@postEdit');
Route::get('users/{id}', 'UsersController@getShow');


Route::controller('comments', 'CommentsController');

Route::get('/{slug?}', ['uses' => 'ForumController@getIndex', 'as' => 'home']);

