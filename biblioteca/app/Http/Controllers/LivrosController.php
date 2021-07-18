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
	
	public function show ($id){
		$livro = Livro::findOrFail($id);
		return view('livros.show', ['livro' => $livro]);
	}
	
	public function edit ($id){
		$livro = Livro::findOrFail($id);
		return view('livros.edit', ['livro' => $livro]);
	}
	
	public function update(Request $request, $id){
		$livro = Livro::findOrFail($id);
		$livro = $livro -> update([
			'nome' => $request['nome'],
			'editora' => $request['editora'],
			'autor' => $request['autor'],
			'preco' => $request['preco'],
			'ano' => $request['ano']
			]);
		
		return "Edição realizada com sucesso!!!";
		
	}
	
	
}
