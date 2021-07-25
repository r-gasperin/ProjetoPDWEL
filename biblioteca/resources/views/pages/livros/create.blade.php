@extends('layouts.app')

@section('page_title', 'Adicionar livro')

@section('content')

	<table align="center">
		<thead>
			<tr>
				<th scope="col">Título</th>
				<th scope="col">Autor</th>
				<th scope="col">Editora</th>
				<th scope="col">Ano</th>
				<th scope="col">ISBN</th>
			</tr>
			<tr>
				<th scope="col" colspan="2">Descrição</th>
				<th scope="col"></th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
	</table>
	<br>

	<form action="{{ route('add-livro.post') }}" method="POST" id="add">
		@csrf
	</form>

	<table align="center">
		<tbody>
			<tr>
				<td>
					<input type="text" name="titulo" value="{{ old('titulo') }}" form="add"/>
					@if ($errors->has('titulo'))
						<br>
						<small class="error">
							{{ $errors->first('titulo') }}
						</small>
					@endif
				</td>
				<td>
					<input type="text" name="autor" value="{{ old('autor') }}" form="add"/>
					@if ($errors->has('autor'))
						<br>
						<small class="error">
							{{ $errors->first('autor') }}
						</small>
					@endif
				</td>
				<td>
					<input type="text" name="editora" value="{{ old('editora') }}" form="add"/>
					@if ($errors->has('editora'))
						<br>
						<small class="error">
							{{ $errors->first('editora') }}
						</small>
					@endif
				</td>
				<td>
					<input type="number" name="ano" value="{{ old('ano') }}" form="add"/>
					@if ($errors->has('ano'))
						<br>
						<small class="error">
							{{ $errors->first('ano') }}
						</small>
					@endif
				</td>
				<td>
					<input type="text" name="isbn" value="{{ old('isbn') }}" form="add"/>
					@if ($errors->has('isbn'))
						<br>
						<small class="error">
							{{ $errors->first('isbn') }}
						</small>
					@endif
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="text" name="descricao" value="{{ old('descricao') }}" form="add" class="double"/>
					@if ($errors->has('descricao'))
						<br>
						<small class="error">
							{{ $errors->first('descricao') }}
						</small>
					@endif
				</td>
				<td></td>
				<td></td>
				<td>
					<a href="{{ route('livros.get') }}">Voltar</a>
					<button onclick="return confirm('Realmente deseja salvar esse registro?')" form="add">Add</button>
				</td>
			</tr>
		</tbody>
	</table>
	<br>

@endsection
