@extends('layouts.app')

@section('page_title', 'Clientes')

@section('add_link')
	<a href="{{ route('add-cliente.get') }}" class="add">Add</a>
@endsection

@section('content')

	@if (count($clientes) == 0)
		<!-- Empty state -->
		<h2 class="empty">Nenhum cliente cadastrado</h2>
	@else
		<table align="center">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
					<th scope="col">RG</th>
					<th scope="col">DDD</th>
				</tr>
				<tr>
					<th scope="col">Telefone</th>
					<th scope="col" colspan="2">Endereço</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
		</table>
	@endif
	<br>

	@foreach($clientes as $obj)

		<form action="{{ route('cliente.post') }}" method="POST" id="atualizar{{ $obj->id }}">
			@csrf
		</form>

		<form action="{{ route('cliente.delete') }}" method="GET" id="deletar{{ $obj->id }}">
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
						<input type="text" name="nome" value="{{ $obj->nome }}" form="atualizar{{ $obj->id }}"/>
						@if ($errors->has('nome'))
							<br>
							<small class="error">
								{{ $errors->first('nome') }}
							</small>
						@endif
					</td>
					<td>
						<input type="email" value="{{ $obj->email }}" disabled/>
					</td>
					<td>
						<input type="text" value="{{ $obj->rg }}" disabled/>
					</td>
					<td>
						<input type="text" name="ddd" value="{{ $obj->ddd }}" form="atualizar{{ $obj->id }}"/>
						@if ($errors->has('ddd'))
							<br>
							<small class="error">
								{{ $errors->first('ddd') }}
							</small>
						@endif
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="telefone" value="{{ $obj->telefone }}" form="atualizar{{ $obj->id }}"/>
						@if ($errors->has('telefone'))
							<br>
							<small class="error">
								{{ $errors->first('telefone') }}
							</small>
						@endif
					</td>
					<td colspan="2">
						<input type="text" name="endereco" value="{{ $obj->endereco }}" form="atualizar{{ $obj->id }}" class="double"/>
						@if ($errors->has('endereco'))
							<br>
							<small class="error">
								{{ $errors->first('endereco') }}
							</small>
						@endif
					</td>
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
