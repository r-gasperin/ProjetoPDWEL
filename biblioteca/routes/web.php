<?php

use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LivrosController;
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

Route::get('/', [EmprestimosController::class, 'show'])->name('home');

Route::get('/emprestimos/novo', [EmprestimosController::class, 'create']);
Route::post('/emprestimos/novo', [EmprestimosController::class, 'store'])->name('registrar_emprestimo');
Route::get('/emprestimos/listar', [EmprestimosController::class, 'show'])->name('emprestimos');
Route::put('/emprestimos/devolver/{id}', [EmprestimosController::class, 'devolver']);

Route::get('/clientes/listar', [ClienteController::class, 'show'])->name('clientes.get');
Route::post('/clientes/editar', [ClienteController::class, 'update'])->name('cliente.post');
Route::get('/clientes/deletar', [ClienteController::class, 'delete'])->name('cliente.delete');
Route::get('/clientes/novo', [ClienteController::class, 'create'])->name('add-cliente.get');
Route::post('/clientes/novo', [ClienteController::class, 'store'])->name('add-cliente.post');

Route::get('/livros/novo', [LivrosController::class, 'create']);
Route::post('/livros/novo', [LivrosController::class, 'store'])->name('registrar_livro');
Route::get('/livros/listar', [LivrosController::class, 'show'])->name('livros');
Route::get('/livro/editar/{id}', [LivrosController::class, 'edit']);
Route::post('/livro/editar/{id}', [LivrosController::class, 'update'])->name('editar_livro');
Route::get('/livro/deletar/{id}', [LivrosController::class, 'delete']);
Route::post('/livro/deletar/{id}', [LivrosController::class, 'destroy'])->name('deletar_livro');
