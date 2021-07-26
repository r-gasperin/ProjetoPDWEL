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

// Rota padrao, da raiz --> "redireciona" para lista de emprestimos
Route::get('/', [EmprestimosController::class, 'show'])->name('home');

Route::get('/emprestimos/listar', [EmprestimosController::class, 'show'])->name('emprestimos.get');
Route::post('/emprestimos/editar', [EmprestimosController::class, 'update'])->name('emprestimo.post');
Route::get('/emprestimos/deletar', [EmprestimosController::class, 'delete'])->name('emprestimo.delete');
Route::get('/emprestimos/novo', [EmprestimosController::class, 'create'])->name('add-emprestimo.get');
Route::post('/emprestimos/novo', [EmprestimosController::class, 'store'])->name('add-emprestimo.post');

Route::get('/clientes/listar', [ClienteController::class, 'show'])->name('clientes.get');
Route::post('/clientes/editar', [ClienteController::class, 'update'])->name('cliente.post');
Route::get('/clientes/deletar', [ClienteController::class, 'delete'])->name('cliente.delete');
Route::get('/clientes/novo', [ClienteController::class, 'create'])->name('add-cliente.get');
Route::post('/clientes/novo', [ClienteController::class, 'store'])->name('add-cliente.post');

Route::get('/livros/listar', [LivrosController::class, 'show'])->name('livros.get');
Route::post('/livros/editar', [LivrosController::class, 'update'])->name('livro.post');
Route::get('/livros/deletar', [LivrosController::class, 'delete'])->name('livro.delete');
Route::get('/livros/novo', [LivrosController::class, 'create'])->name('add-livro.get');
Route::post('/livros/novo', [LivrosController::class, 'store'])->name('add-livro.post');
