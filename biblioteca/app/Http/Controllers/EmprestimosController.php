<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Pessoa;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;

class EmprestimosController extends Controller
{
	public function create(){
		$pessoas = Pessoa::get();
		$livros = Livro::get();
		return view('emprestimos.create', ['pessoas' => $pessoas, 'livros' => $livros]);
	}
	
	public function store(Request $request){
		//TODO EXEMPLO CONSULTA BANCO DE DADOS
		//$pessoas = DB::select('select * from pessoas where id = ?', [4]);
	
		return "Cadastro realizado com sucesso!!!";
	}
}
