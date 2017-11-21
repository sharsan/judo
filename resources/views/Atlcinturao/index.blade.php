@extends('admin')
@section('content')
<title>Cinturões </title>

<div class="container"> 
  <h3><center><th>Cinturões - Atletas</th></center> </h3>


  <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

  <table class="table table-striped" id="myTable">  


    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->
      <thead>    

        <a href="{{URL::to('atleta_id')}}" title=""><h4>Atletas</h4></a>
        <a href="{{URL::to('cinturao_id')}}" title=""><h4>Cintos</h4></a>

        <div class="form-group col-md-4"> <br>
          <a href="{{URL::to('atlcinto/create')}}" title=""><h4>Atribuir cinturão ao atleta</h4></a> 
        </div>

        <thead>
          <tr>
            {{-- <th>ID</th> --}}
            <th>Atleta</th>
            <th>Cinto</th>  
            <th>Graduado em</th> 
    {{--         <th>Criado em</th>
      <th>Actualizado em</th>  --}} 
    </tr>
  </thead>
  <tbody>
    @foreach($atlcinturao as $post)
    <tr>
      {{-- <td>{{$post['id']}}</td> --}}
      <td>{{$post['atleta_id']}}</td> 
      <td>{{$post['cinturao_id']}}</td> 
      <td>{{$post['data']}}</td> 
           {{--  <td>{{$post['created_at']}}</td>
           <td>{{$post['updated_at']}}</td>  --}}


           <td><a href="{{action('AtlCinturaoController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
           <td> 

            <form action="{{action('AtlCinturaoController@destroy', $post['id'])}}" method="post">
              {{csrf_field()}}
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Apagar</button>
            </form>
          </td>
        </div>  <!--  este div inseri pra separa o Search com o restante -->

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