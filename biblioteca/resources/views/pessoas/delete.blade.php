<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Editar de Pessoa</title>
</head>
<body>
	<form action="{{ route('deletar_pessoa', ['id' => $pessoa->id]) }}" method="POST">
		@csrf
		<label>Tem certeza que deseja excluir esse registro?</label><br/>
		<input type="text" name="nome" value="{{$pessoa->nome}}" readonly="readonly" /><br/>
		
		<button>Sim</button>
	</form>
</body>
</html>