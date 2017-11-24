@extends('admin')
@section('content')
<title>Atletas - Treinadores</title>
<div class="container">
  <h3><center><th>Atletas - Treinadores</th></center> </h3>
  
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
  </nav>   
  
  <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

  <table class="table table-striped" id="myTable">    

    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->

      <thead>

        <a href="{{URL::to('atleta')}}" title=""><h4>Atleta</h4></a>
        <a href="{{URL::to('treinador')}}" title=""><h4>Treinador</h4></a>
        <a href="{{URL::to('atltreinador/create')}}" title=""><h4>Alocar atleta a um treinador</h4></a>

        <tr>
          {{-- <th>ID</th> --}} 
          <th>Treinador</th> 
          <th>Atleta</th> 
         {{--  <th>Criado em</th>
          <th>Actualizado em</th>  --}}

        </tr>
      </thead>
      <tbody>
        @foreach($atltreinador as $post)
        <tr>
          {{-- <td>{{$post['id'        ]}}</td> --}} 
          <td>{{$post['treinador_id']}}</td> 
          <td>{{$post['atleta_id'     ]}}</td> 
  {{--         <td>{{$post['created_at']}}</td>
  <td>{{$post['updated_at']}}</td> --}}

  <td><a href="{{action('AtlTreinadorController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
  <td>
    <form action="{{action('AtlTreinadorController@destroy', $post['id'])}}" method="post">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="DELETE">
      <button class="btn btn-danger" type="submit">Apagar</button>
    </form>
  </td>
</tr>       
</div>  <!--  este div inseri pra separa o Search com o restante -->
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
