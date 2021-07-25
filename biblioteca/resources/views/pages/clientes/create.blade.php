@extends('layouts.app')

@section('page_title', 'Adicionar cliente')

@section('content')

	<table align="center">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">RG</th>
				<th scope="col">DDD</th>
				<th scope="col">Telefone</th>
			</tr>
			<tr>
				<th scope="col" colspan="2">Endereço</th>
				<th scope="col"></th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
	</table>
	<br>

	<form action="{{ route('add-cliente.post') }}" method="POST" id="add">
		@csrf
	</form>

	<table align="center">
		<tbody>
			<tr>
				<td>
					<input type="text" name="nome" value="{{ old('nome') }}" form="add"/>
					@if ($errors->has('nome'))
						<br>
						<small class="error">
							{{ $errors->first('nome') }}
						</small>
					@endif
				</td>
				<td>
					<input type="email" name="email" value="{{ old('email') }}" form="add"/>
					@if ($errors->has('email'))
						<br>
						<small class="error">
							{{ $errors->first('email') }}
						</small>
					@endif
				</td>
				<td>
					<input type="text" name="rg" value="{{ old('rg') }}" form="add"/>
					@if ($errors->has('rg'))
						<br>
						<small class="error">
							{{ $errors->first('rg') }}
						</small>
					@endif
				</td>
				<td>
					<input type="text" name="ddd" value="{{ old('ddd') }}" form="add"/>
					@if ($errors->has('ddd'))
						<br>
						<small class="error">
							{{ $errors->first('ddd') }}
						</small>
					@endif
				</td>
				<td>
					<input type="text" name="telefone" value="{{ old('telefone') }}" form="add"/>
					@if ($errors->has('telefone'))
						<br>
						<small class="error">
							{{ $errors->first('telefone') }}
						</small>
					@endif
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="text" name="endereco" value="{{ old('endereco') }}" form="add" class="double"/>
					@if ($errors->has('endereco'))
						<br>
						<small class="error">
							{{ $errors->first('endereco') }}
						</small>
					@endif
				</td>
				<td></td>
				<td></td>
				<td>
					<a href="{{ route('clientes.get') }}">Voltar</a>
					<button onclick="return confirm('Realmente deseja salvar esse registro?')" form="add">Add</button>
				</td>
			</tr>
		</tbody>
	</table>
	<br>

@endsection
