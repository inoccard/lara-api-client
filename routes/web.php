<?php

$this->resource('products','ProductController');
$this->get('products/pg/{page}','ProductController@paginate')->name('products.paginate');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
