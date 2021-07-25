<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller {
	
	public function show() {

		$livros = Livro::get();
		return view('pages.livros.show', compact('livros'));
	}
	
	public function update(Request $request) {

        $this->validate($request, [
			'titulo' => 'required|max:100',
			'autor' => 'required|max:50',
			'editora' => 'nullable|max:50',
			'ano' => 'nullable|digits:4|integer',
			'descricao' => 'nullable|max:255'
        ]);

		$livro = Livro::findOrFail($request['id']);
		$livro = $livro -> update([
			'titulo' => $request['titulo'],
			'autor' => $request['autor'],
			'editora' => $request['editora'],
			'ano' => $request['ano'],
			'descricao' => $request['descricao']
		]);

		return redirect()->route('livros.get');
	}
	
	public function delete(Request $request) {
		
		$livro = Livro::findOrFail($request['id']);
		$livro-> delete();
		return redirect()->route('livros.get');
	}

	public function create() {
    	return view('pages.livros.create');
	}
	
	public function store(Request $request) {

        $this->validate($request, [
			'titulo' => 'required|max:100',
			'autor' => 'required|max:50',
			'editora' => 'nullable|max:50',
			'ano' => 'nullable|digits:4|integer',
			'isbn' => 'required|unique:livros|min:13|max:13',
			'descricao' => 'nullable|max:255'
        ]);

		$livro = new Livro;
		$livro = $livro -> create([
			'titulo' => $request['titulo'],
			'autor' => $request['autor'],
			'editora' => $request['editora'],
			'ano' => $request['ano'],
			'isbn' => $request['isbn'],
			'descricao' => $request['descricao']
		]);
		
		return redirect()->route('livros.get');
	}
}
