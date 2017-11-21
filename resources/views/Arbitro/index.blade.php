@extends('admin')
@section('content')
<title>Arbitros </title>
<div class="container"> 
  <h3><center><th>Árbitros</th></center> </h3>
  
  <table class="table table-striped" id="myTable">  
    <br> 
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
    </nav> 
    
    <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">


    <a href="{{URL::to('arbitro/create')}}" title=""><h4>Adicionar arbitro</h4></a>
    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Nome</th> 
        <th>Apelido</th> 
        <th>Sexo</th>
        <th>Ano (nasc)</th>
        <th>Telefone</th>
        <th>email</th> 
{{--         <th>Criado em</th>
  <th>Actualizado em</th>  --}}
</tr>
</thead>
<tbody>
  @foreach($arbitro as $post)
  <tr>
    {{-- <td>{{$post['id']}}</td> --}}
    <td>{{$post['nome']}}</td>
    <td>{{$post['apelido']}}</td> 
    <td>{{$post['sexo']}}</td>
    <td>{{$post['ano']}}</td> 
    <td>{{$post['telefone']}}</td>
    <td>{{$post['email']}}</td> 
     {{--    <td>{{$post['created_at']}}</td>
     <td>{{$post['updated_at']}}</td> --}}

     <td><a href="{{action('ArbitroController@edit', $post['id'])}}" class="btn btn-success">Editar</a></td>
     <td>
      <form action="{{action('ArbitroController@destroy', $post['id'])}}" method="post">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
        <button class="btn btn-danger" type="submit">Apagar</button>

      </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>


<script type="text/javascript">

 function filtrar() {

  var input = document.getElementById("txtPesk");
  var tabela = document.getElementById("myTable");
  var linhas = tabela.getElementsByTagName("tr");

  for (var indice = 3; indice < linhas.length; indice++) {
    var coluna = linhas[indice].getElementsByTagName("td")[1];
    if (coluna) {
      if (coluna.innerHTML.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
        linhas[indice].style.display = "";
      } else {
        linhas[indice].style.display = "none";
      }
    }
  }
}

</script>
@endsection