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

Auth::routes();

Route::get('/', 'Front\Dashboard@index');
Route::resource('/admin/receipts', 'Back\Receipts');
Route::resource('/admin/ingredients', 'Back\Ingredients');
Route::post('/admin/ingredients/search', 'Back\Ingredients@search');
Route::post('/admin/tinymce/upload', 'Back\Tinymce@upload');
Route::get('/admin/parsed-receipts', 'Back\ParsedReceipts@index');

Route::get('/receipts/purchases/{receipt}', 'Front\Receipts@purchases');
Route::get('/receipts/{receipt}', 'Front\Receipts@show');
Route::get('/ingredients/{ingredient}', 'Front\Ingredients@show');
Route::get('/purchases', 'Front\Purchases@index');
Route::get('/purchases/buy/{purchase}', 'Front\Purchases@buy');
Route::get('/purchases/add_to_purchases/{purchase}', 'Front\Purchases@addToPurchases');
Route::get('/purchases/clear', 'Front\Purchases@clear');
Route::get('/purchases/add', 'Front\Purchases@add');


//Route::get('/home', 'HomeController@index')->name('home');
