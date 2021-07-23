<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Listagem de Livros</title>
</head>
<body>
	<a href="/livros/novo">Novo</a>
	<table class="table table-bordered" border="1">
		<thead>
			<tr>
				<th scope="col">Título</th>
				<th scope="col">Descrição</th>
				<th scope="col">Editora</th>
				<th scope="col">Autor</th>
				<th scope="col">ISBN</th>
				<th scope="col">Preço</th>
				<th scope="col">Ano</th>
				<th scope="col">#</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $livros as $obj)
			<tr>
				<td>{{ $obj->nome }}</td>
				<td>{{ $obj->descricao }}</td>
				<td>{{ $obj->editora }}</td>
				<td>{{ $obj->autor }}</td>
				<td>{{ $obj->isbn }}</td>
				<td>{{ $obj->preco }}</td>
				<td>{{ $obj->ano }}</td>
				<td>
					<a href="/livro/editar/{{ $obj->id }}">Editar</a> <br/>
					<a href="/livro/deletar/{{ $obj->id }}">Excluir</a>
				</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>