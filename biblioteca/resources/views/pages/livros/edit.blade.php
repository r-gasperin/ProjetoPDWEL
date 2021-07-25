<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Livro</title>
</head>
<body>
	<form action="{{ route('editar_livro', ['id' => $livro->id]) }}" method="POST">
		@csrf
		<label>Título</label><br/>
		<input type="text" name="nome" value="{{$livro->nome}}" /><br/>
		
		<label>Descrição</label><br/>
		<input type="text" name="descricao" value="{{$livro->descricao}}" /><br/>
		
		<label>Editora</label><br/>
		<input type="text" name="editora" value="{{$livro -> editora}}"/><br/>
		
		<label>Autor</label><br/>
		<input type="text" name="autor" value="{{$livro -> autor}}" /><br/>
		
		<label>ISBN</label><br/>
		<input type="text" name="isbn" value="{{$livro -> isbn}}" /><br/>
		
		<label>Preço</label><br/>
		<input type="text" name="preco" value="{{$livro -> preco}}" /><br/>
		
		<label>Ano</label><br/>
		<input type="text" name="ano" value="{{$livro -> ano}}"/><br/>
		<a href="/livros/listar">Voltar</a>
		<button onclick="return confirm('Realmente deseja editar esse registro?')">Editar</button>
	</form>
</body>
</html>