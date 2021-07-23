<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Pessoa</title>
</head>
<body>
	<form action="{{ route('registrar_pessoa') }}" method="POST">
		@csrf
		<label>Nome</label><br/>
		<input type="text" name="nome" maxlength="100" /><br/>
		
		<label>CPF</label><br/>
		<input type="text" name="cpf" maxlength="15"/><br/>
		
		<label>E-Mail</label><br/>
		<input type="email" name="email" maxlength="150" /><br/>
		
		<label>Endereço</label><br/>
		<input type="text" name="endereco"  maxlength="150"/><br/>
		
		<label>DDD</label><br/>
		<input type="text" name="ddd"  maxlength="2"/><br/>
		
		<label>Telefone</label><br/>
		<input type="text" name="telefone" maxlength="9" /><br/>
		<a href="/pessoas/listar">Voltar</a>
		<button onclick="return confirm('Realmente deseja salvar esse registro?')">Salvar</button>
	
	</form>
</body>
</html>