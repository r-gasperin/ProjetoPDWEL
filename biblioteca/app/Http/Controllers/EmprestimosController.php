<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Emprestimo;
use App\Models\Cliente;
use App\Models\Livro;

class EmprestimosController extends Controller {
	
	public function show() {

		$emprestimos = Emprestimo::with('clientes')->with('livros')->get();
		return view('pages.emprestimos.show', compact('emprestimos'));
	}
	
	public function update(Request $request) {

		$hoje = null;
		$devolvido = false;
		$msg = "Empréstimo já está em andamento";

		// Usuario "concluiu" o emprestimo
		if ($request['devolvido'] == 1) {
			$hoje = date('Y-m-d');
			$devolvido = true;
			$msg = "Empréstimo já está encerrado";
		}

		// Verifica situacao do emprestimo
		$query = DB::select('select devolvido from emprestimos where id = ?', [$request['id']]);

		if ($query[0]->devolvido == $request['devolvido']) {
			return back()->withErrors([
				'devolvido' => $msg
			])->withInput();
		}

		$emprestimo = Emprestimo::findOrFail($request['id']);
		$emprestimo = $emprestimo -> update([
			'data_devolucao' => $hoje,
			'devolvido' => $devolvido
		]);

		return redirect()->route('emprestimos.get');
	}

	public function delete(Request $request) {
		
		$emprestimo = Emprestimo::findOrFail($request['id']);
		$emprestimo-> delete();
		return redirect()->route('emprestimos.get');
	}

	public function create() {

		$clientes = Cliente::get();
		$livros = Livro::get();
    	return view('pages.emprestimos.create', compact('clientes', 'livros'));
	}
	
	public function store(Request $request) {

        $this->validate($request, [
			'cliente' => 'integer|min:1',
			'livro' => 'integer|min:1'
        ]);

		$query = DB::select(
			'select count(1) as qtde from emprestimos where id_cliente = ? and devolvido = ?',
			[$request['cliente'], 0]);

		if ($query[0]->qtde >= 3) {
			return back()->withErrors([
				'limite' => 'Cliente já possui o limite de livros permitidos.'
			])->withInput();
		}

		$hoje = date('Y-m-d');

		$emprestimo = new Emprestimo;
		$emprestimo = $emprestimo -> create([
			'id_cliente' => $request['cliente'],
			'id_livro' => $request['livro'],
			'data_inicio' => $hoje,
			'data_fim' =>  Carbon::createFromFormat("Y-m-d", $hoje)->addDays(14),
			'devolvido' => false,
		]);
		
		return redirect()->route('emprestimos.get');
	}
}
