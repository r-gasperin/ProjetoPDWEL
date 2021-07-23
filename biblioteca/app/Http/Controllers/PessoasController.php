<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Redirect;

class PessoasController extends Controller
{
    public function create(){
    	return view('pessoas.create');
	}
	
	public function store(Request $request){
// 		dd($request->all());
		$pessoa = new Pessoa;
		$pessoa = $pessoa -> create([
			'nome' => $request['nome'],
			'cpf' => $request['cpf'],
			'email' => $request['email'],
			'endereco' => $request['endereco'],
			'ddd' => $request['ddd'],
			'telefone' => $request['telefone']
		]);
		
		return Redirect::to('/pessoas/listar');
	}
	
	public function show (){
		$pessoas = Pessoa::get();
		return view('pessoas.show', ['pessoas' => $pessoas]);	
	}
	
	public function edit($id){
		$pessoa = Pessoa::findOrFail($id);
		return view('pessoas.edit', ['pessoa' => $pessoa]);
	}
	
	public function update(Request $request, $id){

		$pessoa = Pessoa::findOrFail($id);
		$pessoa = $pessoa -> update([
				'nome' => $request['nome'],
				'cpf' => $request['cpf'],
				'email' => $request['email'],
				'endereco' => $request['endereco'],
				'ddd' => $request['ddd'],
				'telefone' => $request['telefone']
				]);
	
		return Redirect::to('/pessoas/listar');
	}
	
	public function delete ($id){
		$pessoa = Pessoa::findOrFail($id);
		return view('pessoas.delete', ['pessoa' => $pessoa]);
	}
	
	public function destroy ($id){
		$pessoa = Pessoa::findOrFail($id);
		$pessoa-> delete();
		return Redirect::to('/pessoas/listar');		
	}
	
}
