<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Redirect;

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
		'isbn' => $request['isbn'],
		'descricao' => $request['descricao'],
		'ano' => $request['ano']
		]);
	
		return Redirect::to('/livros/listar');
	}
	
	public function show (){
		$livros = Livro::get();
		return view('livros.show', ['livros' => $livros]);
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
			'isbn' => $request['isbn'],
			'descricao' => $request['descricao'],
			'ano' => $request['ano']
			]);
		
		return Redirect::to('/livros/listar');
		
	}
	
	public function delete ($id){
		$livro = Livro::findOrFail($id);
		return view('livros.delete', ['livro' => $livro]);
	}
	
	public function destroy ($id){
		$livro = Livro::findOrFail($id);
		$livro-> delete();
		return Redirect::to('/livros/listar');	
	}
	
}
