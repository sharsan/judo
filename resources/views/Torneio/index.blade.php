@extends('admin')
@section('content')
<title>Torneios </title>
<div class="container">
  <h3><center><th>Torneios</th></center> </h3>


  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
  </nav>    
  
  <table class="table table-striped" id="myTable"> 

    <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

    <a href="{{URL::to('torneio/create')}}" title=""><h4>Adicionar torneio</h4></a>
    <a href="{{URL::to('et')}}" title=""><h4>Ver estado dos torneios</h4></a>
    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Evento</th> 
        <th>Inicio</th>
        <th>Término</th> 
   {{--      <th>Criado em</th>
    <th>Actualizado em</th> --}} 
  </tr>
</thead>
<tbody>
  @foreach($torneio as $post)
  <tr>

    {{-- <td>{{$post['id']}}</td> --}}
    <td>{{$post['nome']}}</td> 
    <td>{{$post['datai']}}</td>
    <td>{{$post['datat']}}</td> 
      {{--   <td>{{$post['created_at']}}</td>
      <td>{{$post['updated_at']}}</td> --}}

      <!-- <td><a href="{{action('EsttController@index', $post['id'])}}" class="btn btn-success">Estado</a></td> -->
      <td><a href="{{action('TorneioController@edit', $post['id'])}}" class="btn btn-success">Editar</a></td>
      <td>
        <form action="{{action('TorneioController@destroy', $post['id'])}}" method="post">
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

  for (var indice = 1; indice < linhas.length; indice++) {
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