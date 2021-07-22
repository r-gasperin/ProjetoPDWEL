<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewimport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registrar Emprestimo</title>
</head>
<body>
	<form action="{{ route('registrar_emprestimo') }}" method="POST">
		@csrf
		<label>Pessoa</label><br/>
		
		<select name="pessoa">
        	<option value="0">::Selecione::</option>
        	@foreach($pessoas as $p )
	           	<option value="{{$p->id}}"> {{$p->nome}}</option>
	        @endforeach
        </select><br/>
		
		<label>Livro</label><br/>
		<select name="livro">
        	<option value="0">::Selecione::</option>
        	@foreach($livros as $l )
	           	<option value="{{$l->id}}"> {{$l->nome}}</option>
	        @endforeach
        </select><br/>
		
		<button>Salvar</button>
	
	</form>
</body>
</html>