<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('/customers', 'CustomerController');
Route::controller('/transactions', 'TransactionController');
//Route::controller('/notes', 'NoteController');
//Route::controller('/contacts', 'ContactController');
//Route::controller('/locations', 'LocationController');
//Route::controller('/employees', 'EmployeeController');
//Route::controller('/users', 'UserController');
Route::get('/', function () {return View::make('layout'); });
