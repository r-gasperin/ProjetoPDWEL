@extends('layouts.app')

@section('page_title', 'Empréstimos')

@section('add_link')
	<a href="{{ route('add-emprestimo.get') }}" class="add">Add</a>
@endsection

@section('content')

	@if (count($emprestimos) == 0)
		<!-- Empty state -->
		<h2 class="empty">Nenhum empréstimo cadastrado</h2>
	@else
		<table align="center">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Cliente</th>
					<th scope="col">Livro</th>
					<th scope="col">Data início</th>
					<th scope="col">Data fim</th>
				</tr>
				<tr>
					<th scope="col">Data devolução</th>
					<th scope="col">Devolvido</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
		</table>
	@endif
	<br>

	@foreach($emprestimos as $obj)

		<form action="{{ route('emprestimo.post') }}" method="POST" id="atualizar{{ $obj->id }}">
			@csrf
		</form>

		<form action="{{ route('emprestimo.delete') }}" method="GET" id="deletar{{ $obj->id }}">
			@csrf
		</form>

		<table align="center">
			<tbody>
				<tr>
					<td>
						<input type="text" value="{{ $obj->id }}" disabled/>
						<input type="hidden" name="id" value="{{ $obj->id }}" form="atualizar{{ $obj->id }}"/>
						<input type="hidden" name="id" value="{{ $obj->id }}" form="deletar{{ $obj->id }}"/>
					</td>
					<td>
						<input type="text" value="[{{ $obj->clientes->id }}] {{ $obj->clientes->nome }}" disabled/>
					</td>
					<td>
						<input type="text" value="[{{ $obj->livros->id }}] {{ $obj->livros->titulo }}" disabled/>
					</td>
					<td>
						<input type="text" value="{{ date('d/m/Y', strtotime($obj->data_inicio)) }}" disabled/>
					</td>
					<td>
						<input type="text" value="{{ date('d/m/Y', strtotime($obj->data_fim)) }}" disabled/>
					</td>
				</tr>
				<tr>
					<td>
						@if ($obj->data_devolucao != null)
							<input type="text" value="{{ date('d/m/Y', strtotime($obj->data_devolucao)) }}" disabled/>
						@else
							<input type="text" value="Aguardando..." disabled/>
						@endif
					</td>
					<td>
						<select name="devolvido" form="atualizar{{ $obj->id }}">
							@if ($obj->devolvido == 0)
								<option value="0" selected>Não</option>
								<option value="1">Sim</option>
							@else
								<option value="0">Não</option>
								<option value="1" selected>Sim</option>
							@endif
						</select>
						@if ($errors->has('devolvido'))
							<br>
							<small class="error">
								{{ $errors->first('devolvido') }}
							</small>
						@endif
					</td>
					<td></td>
					<td></td>
					<td>
						<button onclick="return confirm('Realmente deseja excluir esse registro?')" form="deletar{{ $obj->id }}">Deletar</button>
						<button onclick="return confirm('Realmente deseja editar esse registro?')" form="atualizar{{ $obj->id }}">Atualizar</button>
					</td>
				</tr>
			</tbody>
		</table>
		<br>

	@endforeach

@endsection
