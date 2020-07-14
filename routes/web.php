<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'authors'], function(){
    Route::get('', 'AuthorController@index')->name('author.index');
    Route::get('create', 'AuthorController@create')->name('author.create');
    Route::post('store', 'AuthorController@store')->name('author.store');
    Route::get('edit/{author}', 'AuthorController@edit')->name('author.edit');
    Route::post('update/{author}', 'AuthorController@update')->name('author.update');
    Route::post('delete/{author}', 'AuthorController@destroy')->name('author.destroy');
    Route::get('show/{author}', 'AuthorController@show')->name('author.show');
 });
 

 Route::group(['prefix' => 'books'], function(){
    Route::get('', 'BookController@index')->name('book.index');
    Route::get('create', 'BookController@create')->name('book.create');
    Route::post('store', 'BookController@store')->name('book.store');
    Route::get('edit/{book}', 'BookController@edit')->name('book.edit');
    Route::post('update/{book}', 'BookController@update')->name('book.update');
    Route::post('/delete/{book}', 'BookController@destroy')->name('book.destroy');
    Route::get('show/{book}', 'BookController@show')->name('book.show');
 });
 
 