@extends('layouts.app')

@section('page_title', 'Livros')

@section('add_link')
	<a href="{{ route('add-livro.get') }}" class="add">Add</a>
@endsection

@section('content')

	@if (count($livros) == 0)
		<!-- Empty state -->
		<h2 class="empty">Nenhum livro cadastrado</h2>
	@else
		<table align="center">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Título</th>
					<th scope="col">Autor</th>
					<th scope="col">Editora</th>
					<th scope="col">Ano</th>
				</tr>
				<tr>
					<th scope="col">ISBN</th>
					<th scope="col" colspan="2">Descrição</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
		</table>
	@endif
	<br>

	@foreach($livros as $obj)

		<form action="{{ route('livro.post') }}" method="POST" id="atualizar{{ $obj->id }}">
			@csrf
		</form>

		<form action="{{ route('livro.delete') }}" method="GET" id="deletar{{ $obj->id }}">
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
						@if (old('id') == $obj->id)
							<input type="text" name="titulo" value="{{ old('titulo') }}" form="atualizar{{ $obj->id }}"/>
						@else
							<input type="text" name="titulo" value="{{ $obj->titulo }}" form="atualizar{{ $obj->id }}"/>
						@endif
						@if ($errors->has('titulo') && old('id') == $obj->id)
							<br>
							<small class="error">
								{{ $errors->first('titulo') }}
							</small>
						@endif
					</td>
					<td>
						@if (old('id') == $obj->id)
							<input type="text" name="autor" value="{{ old('autor') }}" form="atualizar{{ $obj->id }}"/>
						@else
							<input type="text" name="autor" value="{{ $obj->autor }}" form="atualizar{{ $obj->id }}"/>
						@endif
						@if ($errors->has('autor') && old('id') == $obj->id)
							<br>
							<small class="error">
								{{ $errors->first('autor') }}
							</small>
						@endif
					</td>
					<td>
						@if (old('id') == $obj->id)
							<input type="text" name="editora" value="{{ old('editora') }}" form="atualizar{{ $obj->id }}"/>
						@else
							<input type="text" name="editora" value="{{ $obj->editora }}" form="atualizar{{ $obj->id }}"/>
						@endif
						@if ($errors->has('editora') && old('id') == $obj->id)
							<br>
							<small class="error">
								{{ $errors->first('editora') }}
							</small>
						@endif
					</td>
					<td>
						@if (old('id') == $obj->id)
							<input type="number" name="ano" value="{{ old('ano') }}" form="atualizar{{ $obj->id }}"/>
						@else
							<input type="number" name="ano" value="{{ $obj->ano }}" form="atualizar{{ $obj->id }}"/>
						@endif
						@if ($errors->has('ano') && old('id') == $obj->id)
							<br>
							<small class="error">
								{{ $errors->first('ano') }}
							</small>
						@endif
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" value="{{ $obj->isbn }}" disabled/>
					</td>
					<td colspan="2">
						@if (old('id') == $obj->id)
							<input type="text" name="descricao" value="{{ old('descricao') }}" form="atualizar{{ $obj->id }}" class="double"/>
						@else
							<input type="text" name="descricao" value="{{ $obj->descricao }}" form="atualizar{{ $obj->id }}" class="double"/>
						@endif
						@if ($errors->has('descricao') && old('id') == $obj->id)
							<br>
							<small class="error">
								{{ $errors->first('descricao') }}
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
