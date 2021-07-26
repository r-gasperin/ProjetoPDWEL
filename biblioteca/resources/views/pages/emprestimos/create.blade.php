@extends('layouts.app')

@section('page_title', 'Adicionar empréstimo')

@section('content')

	<table align="center">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Cliente</th>
				<th scope="col">Livro</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
	</table>
	<br>

	<form action="{{ route('add-emprestimo.post') }}" method="POST" id="add">
		@csrf
	</form>

	<table align="center">
		<tbody>
			<tr>
				<td></td>
				<td>
					<select name="cliente" form="add">
						<option value="0">::Selecione::</option>
						@foreach($clientes as $c)
							@if (old('cliente') == $c->id)
								<option value="{{ $c->id }}" selected>[{{ $c->id }}] {{$c->nome}}</option>
							@else
								<option value="{{ $c->id }}">[{{ $c->id }}] {{$c->nome}}</option>
							@endif
						@endforeach
					</select>
					@if ($errors->has('cliente'))
						<br>
						<small class="error">
							{{ $errors->first('cliente') }}
						</small>
					@endif
					@if ($errors->has('limite'))
						<br>
						<small class="error">
							{{ $errors->first('limite') }}
						</small>
					@endif
				</td>
				<td>
					<select name="livro" form="add">
						<option value="0">::Selecione::</option>
						@foreach($livros as $l)
							@if (old('livro') == $l->id)
								<option value="{{ $l->id }}" selected>[{{ $l->id }}] {{ $l->titulo }}</option>
							@else
								<option value="{{ $l->id }}">[{{ $l->id }}] {{ $l->titulo }}</option>
							@endif
						@endforeach
					</select>
					@if ($errors->has('livro'))
						<br>
						<small class="error">
							{{ $errors->first('livro') }}
						</small>
					@endif
				</td>
				<td></td>
				<td>
					<a href="{{ route('emprestimos.get') }}">Voltar</a>
					<button onclick="return confirm('Realmente deseja salvar esse registro?')" form="add">Add</button>
				</td>
			</tr>
		</tbody>
	</table>
	<br>

@endsection
