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

#Admin panel

$groupDate = [
	'namespace' =>'Admin',
	'prefix' => 'admin',
	'middleware' => 'can:admin',
];

Route::group($groupDate, function(){

	$exceptActions = [
		'show',
		'create',
		'store',
	];

	Route::resource('users', 'UserController')
		 ->except($exceptActions)
		 ->names('admin.users');
});
