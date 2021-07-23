<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Pessoa;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Redirect;

class EmprestimosController extends Controller
{
	public function create(){
		$pessoas = Pessoa::get();
		$livros = Livro::get();
		return view('emprestimos.create', ['pessoas' => $pessoas, 'livros' => $livros]);
	}
	
	public function store(Request $request){
		$qtdLivrosEmprestados = DB::select('select count(1) resultado from emprestimos where devolvido = 0 and id_pessoa = ?', [ $request['pessoa']]);
		if ($qtdLivrosEmprestados[0]->resultado >= 3) {
			return "Usuario já possui o limite de livros permitidos.";
		}else{
			$emprestimo = new Emprestimo;
			$emprestimo = $emprestimo -> create([
				'id_pessoa' => $request['pessoa'],
				'id_livro' => $request['livro'],
				'data_incio' => date('Y-m-d'),
				'data_fim' =>  Carbon::createFromFormat("Y-m-d", date('Y-m-d'))->addDays(14),
				'devolvido' => false,
				]);
		}
		return "Cadastro realizado com sucesso!!!";
	}
	
	public function show (Request $request){
		$emprestimos = Emprestimo::with('pessoas')->with('livros')->get();
		return view('emprestimos.show', ['emprestimos' => $emprestimos]);
	}
	
	public function devolver($id){
		$emprestimo = Emprestimo::findOrFail( $id );
		$emprestimo = $emprestimo -> update([
				'data_devolucao' => date('Y-m-d'),
				'devolvido' => true,
				]);
        
        return Redirect::to('/emprestimos/listar');
	}
}
