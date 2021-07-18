<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller
{
	public function create(){
    	return view('livros.create');
	}
	
	public function store(Request $request){
		//dd($request->all());
		$livro = new Livro;
		$livro = $livro -> create([
		'nome' => $request['nome'],
		'editora' => $request['editora'],
		'autor' => $request['autor'],
		'preco' => $request['preco'],
		'ano' => $request['ano']
		]);
	
		return "Cadastro realizado com sucesso!!!";
	}
}
