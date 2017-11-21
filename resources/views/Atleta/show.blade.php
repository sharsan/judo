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
        {{-- <td>{{$atleta->peso}}</td> --}}
    {{-- <td>{{$post['apelido']}}</td> 
    <td>{{$post['sexo']}}</td>
    <td>{{$post['ano']}}</td> 
    <td>{{$post['telefone']}}</td>
    <td>{{$post['email']}}</td> --}}  
  </tr>
</tbody>
</table>
</div>
@endsection


