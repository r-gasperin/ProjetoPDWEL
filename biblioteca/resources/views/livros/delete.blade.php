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
		<label>Tem certeza que deseja excluir esse registro?</label><br/>
		<input type="text" name="nome" value="{{$livro->nome}}" readonly="readonly" /><br/>
		<button>Sim</button>
	</form>
</body>
</html>