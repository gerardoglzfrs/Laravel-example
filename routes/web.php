<?php

Route::resource('trainers', 'trainerController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    return view('welcome');
});

Route::post('trainers/{trainer}/pokemons', 'PokemonController@store');
//Route::resource('pokemons', 'PokemonController');
Route::get('trainers/{trainer}/pokemons', 'PokemonController@index');