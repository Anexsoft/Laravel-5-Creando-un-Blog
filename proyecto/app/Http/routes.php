<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return view('hola');
});

Route::get('/hola/{a}/{b}', function ($a, $b) {
    return view('hola');
});

Route::auth();

Route::get('/home', 'HomeController@index');

/* Controladores */
Route::controller('blog', 'BlogController');