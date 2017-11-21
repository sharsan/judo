@extends('admin')
@section('content')
<title>Atletas </title>
<div class="container">

  <table class="table table-info"> 

    <thead>
      <tr>
        <th>Nome</th> 
        <th>Peso</th> 
        <th>Data da pesagem</th>  
    </tr>
</thead>
<tbody>

  <tr>
    <td>{{$atlpeso->atleta_id}}</td>
    <td>{{$atlpeso->peso}}</td> 
    <td>{{$atlpeso->data}}</td> 
</tr>
</tbody>
</table>
</div>
@endsection


