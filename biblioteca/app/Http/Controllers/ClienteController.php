<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller {
	
	public function show() {

		$clientes = Cliente::get();
		return view('pages.clientes.show', compact('clientes'));
	}
	
	public function update(Request $request) {

        $this->validate($request, [
			'nome' => 'required|max:50',
			'ddd' => 'required|min:2|max:2',
			'telefone' => 'required|min:8|max:9',
			'endereco' => 'nullable|max:255'
        ]);

		$cliente = Cliente::findOrFail($request['id']);
		$cliente = $cliente -> update([
			'nome' => $request['nome'],
			'ddd' => $request['ddd'],
			'telefone' => $request['telefone'],
			'endereco' => $request['endereco']
		]);

		return redirect()->route('clientes.get');
	}
	
	public function delete(Request $request) {
		
		$cliente = Cliente::findOrFail($request['id']);
		$cliente-> delete();
		return redirect()->route('clientes.get');
	}

	public function create() {
    	return view('pages.clientes.create');
	}
	
	public function store(Request $request) {

        $this->validate($request, [
			'nome' => 'required|max:50',
			'email' => 'required|email|unique:clientes|max:320',
			'rg' => 'required|unique:clientes|min:9|max:9',
			'ddd' => 'required|min:2|max:2',
			'telefone' => 'required|min:8|max:9',
			'endereco' => 'nullable|max:255'
        ]);

		$cliente = new Cliente;
		$cliente = $cliente -> create([
			'nome' => $request['nome'],
			'email' => $request['email'],
			'rg' => $request['rg'],
			'ddd' => $request['ddd'],
			'telefone' => $request['telefone'],
			'endereco' => $request['endereco']
		]);
		
		return redirect()->route('clientes.get');
	}
}
