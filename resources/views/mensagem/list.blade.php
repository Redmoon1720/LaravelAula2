<h1>Lista de Mensagem</h1>
<hr>

 <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
	<div class="container">
  		<div class="alert alert-success">
    		{{\Session::get('success')}}
  		</div>
  	</div>
  @endif

@foreach($mensagens as $mensagem)
	<p><a href="/mensagem/{{$mensagem->id}}">{{$mensagem->title}}</a></p>
	<p>{{$mensagem->autor}}</p>
	<a href="/mensagem/{{$mensagem->id}}">visualizar</a>
	<a href="/mensagem/{{$mensagem->id}}/edit">editar</a>
	<a href="/mensagem/{{$mensagem->id}}/delete">deletar</a>
	<br>
@endforeach

<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->