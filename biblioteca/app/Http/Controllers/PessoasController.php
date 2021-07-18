<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

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
		
		return "Cadastro realizado com sucesso!!!";
	}
}
