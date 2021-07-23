<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Editar de Pessoa</title>
</head>
<body>
	<form action="{{ route('editar_pessoa', ['id' => $pessoa->id]) }}" method="POST">
		@csrf
		<label>Nome</label><br/>
		<input type="text" name="nome" value="{{$pessoa->nome}}" maxlength="100" /><br/>
		
		<label>CPF</label><br/>
		<input type="text" name="cpf" value="{{$pessoa->cpf}}" maxlength="15"/><br/>
		
		<label>E-Mail</label><br/>
		<input type="email" name="email" value="{{$pessoa->email}}" maxlength="150" /><br/>
		
		<label>Endereço</label><br/>
		<input type="text" name="endereco" value="{{$pessoa->endereco}}"  maxlength="150"/><br/>
		
		<label>DDD</label><br/>
		<input type="text" name="ddd" value="{{$pessoa->ddd}}" maxlength="2"/><br/>
		
		<label>Telefone</label><br/>
		<input type="text" name="telefone" value="{{$pessoa->telefone}}" maxlength="10" /><br/>
		<a href="/pessoas/listar">Voltar</a>
		<button onclick="return confirm('Realmente deseja editar esse registro?')">Editar</button>
	</form>
</body>
</html>