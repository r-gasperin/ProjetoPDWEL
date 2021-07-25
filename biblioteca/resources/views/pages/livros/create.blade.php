<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Livro</title>
</head>
<body>
	<form action="{{ route('registrar_livro') }}" method="POST">
		@csrf
		<label>Título</label><br/>
		<input type="text" name="nome" /><br/>
		
		<label>Descrição</label><br/>
		<input type="text" name="descricao" /><br/>
		
		<label>Editora</label><br/>
		<input type="text" name="editora" /><br/>
		
		<label>Autor</label><br/>
		<input type="text" name="autor" /><br/>
		
		<label>ISBN</label><br/>
		<input type="text" name="isbn" /><br/>
		
		<label>Preço</label><br/>
		<input type="text" name="preco" /><br/>
		
		<label>Ano</label><br/>
		<input type="text" name="ano" /><br/><br/>
		<a href="/livros/listar">Voltar</a>
		<button onclick="return confirm('Realmente deseja salvar esse registro?')">Salvar</button>
	
	</form>
</body>
</html>