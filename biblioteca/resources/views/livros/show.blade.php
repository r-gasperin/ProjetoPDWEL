<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Livro</title>
</head>
<body>

		<label>Nome</label><br/>
		<input type="text" name="nome" value="{{$livro->nome}}" /><br/>
		
		<label>Editora</label><br/>
		<input type="text" name="editora" value="{{$livro -> editora}}"/><br/>
		
		<label>Autor</label><br/>
		<input type="text" name="autor" value="{{$livro -> autor}}" /><br/>
		
		<label>Preço</label><br/>
		<input type="text" name="preco" value="{{$livro -> preco}}" /><br/>
		
		<label>Ano</label><br/>
		<input type="text" name="ano" value="{{$livro -> ano}}"/><br/>
		
</body>
</html>