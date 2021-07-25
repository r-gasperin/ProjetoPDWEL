<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewimport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Listar Emprestimos</title>
</head>
<body>
	<a href="/emprestimos/novo">Novo</a>
	<table class="table table-bordered" border="1">
		<thead>
			<tr>
				<th scope="col">Pessoa</th>
				<th scope="col">Livro</th>
				<th scope="col">Data Inicio Emprestimo</th>
				<th scope="col">Data Fim Emprestimo</th>
				<th scope="col">Data Devolução</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $emprestimos as $e)
			<tr>
				<td>{{ $e->pessoas->nome }}</td>
				<td>{{ $e->livros->nome }}</td>
				<td>{{ date( 'd/m/Y' , strtotime($e->data_incio))}}</td>
				<td>{{ date( 'd/m/Y' , strtotime($e->data_fim))}}</td>
				@if ($e->data_devolucao != null)
					<td>{{ date( 'd/m/Y' , strtotime($e->data_devolucao))}}</td>
				@else
					<td>{{ $e->data_devolucao }}</td>
				@endif
				@if ($e->devolvido == 0)
					<td>
						<form action="devolver/{{ $e->id }}" method="post">
                        	@csrf
                            @method('put')
                            <button class="btn btn-danger">Devolver</button>
                        </form>
					</td>
				@else
					<td>Devolvido</td>
				@endif
				
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>