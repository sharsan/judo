@extends('admin')
@section('content')
<title>Atletas </title>
<div class="container">

  <table class="table table-info"> 

    <thead>
      <tr>
        <th>Nome</th> 
        <th>Apelido</th> 
        <th>Sexo</th>
        <th>Telefone</th> 
        <th>email</th>   
    </tr>
</thead>
<tbody>

  <tr>
    <td>{{$atleta->nome}}</td>
    <td>{{$atleta->apelido}}</td>
    <td>{{$atleta->sexo}}</td>
    <td>{{$atleta->telefone}}</td>
    <td>{{$atleta->email}}</td>  
</tr>
</tbody>
</table>
</div>
@endsection


