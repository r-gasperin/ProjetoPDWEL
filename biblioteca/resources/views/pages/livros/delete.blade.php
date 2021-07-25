<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Livro</title>
</head>
<body>
	<form action="{{ route('deletar_livro', ['id' => $livro->id]) }}" method="POST">
		@csrf
		<label>Registro a ser excluído</label><br/>
		<input type="text" name="nome" value="{{$livro->nome}}" readonly="readonly" /><br/>
		<a href="/livros/listar">Voltar</a>
		<button onclick="return confirm('Realmente deseja excluir esse registro?')">Confirmar</button>
	</form>
</body>
</html>