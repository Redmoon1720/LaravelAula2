<h1>Excluir Registro</h1>
<hr>
<form action="/mensagem/{{$mensagem->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<p>Tem certeze que deseja excluir o registro {{$mensagem->id}}?</p>
	<input type="submit" value="Deletar">
</form>