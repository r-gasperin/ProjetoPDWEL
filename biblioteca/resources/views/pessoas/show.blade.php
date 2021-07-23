<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Pessoa</title>
</head>
<body>
	<a href="/pessoas/novo">Novo</a>
	<table class="table table-bordered" border="1">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">CPF</th>
				<th scope="col">E-Mail</th>
				<th scope="col">Endereço</th>
				<th scope="col">DDD</th>
				<th scope="col">Telefone</th>
				<th scope="col">#</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $pessoas as $obj)
			<tr>
				<td>{{ $obj->nome }}</td>
				<td>{{ $obj->cpf }}</td>
				<td>{{ $obj->email }}</td>
				<td>{{ $obj->endereco }}</td>
				<td>{{ $obj->ddd }}</td>
				<td>{{ $obj->telefone }}</td>
				<td>
					<a href="/pessoa/editar/{{ $obj->id }}">Editar</a>
					<a href="/pessoa/deletar/{{ $obj->id }}">Excluir</a>	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>