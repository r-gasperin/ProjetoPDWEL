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

Route::get('/pessoas/novo', 'PessoasController@create');
Route::post('/pessoas/novo', 'PessoasController@store')->name('registrar_pessoa');
Route::get('/pessoa/{id}', 'PessoasController@show');
Route::get('/pessoa/editar/{id}', 'PessoasController@edit');
Route::post('/pessoa/editar/{id}', 'PessoasController@update')->name('editar_pessoa');


Route::get('/livros/novo', 'LivrosController@create');
Route::post('/livros/novo', 'LivrosController@store')->name('registrar_livro');
Route::get('/livro/{id}', 'LivrosController@show');
Route::get('/livro/editar/{id}', 'LivrosController@edit');
Route::post('/livro/editar/{id}', 'LivrosController@update')->name('editar_livro');
