@extends('admin')
@section('content')
<title>Treinadores </title> 
<div class="container">
  <h3><center><th>Treinadores</th></center> </h3>
  
  <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">
  
  <table class="table table-striped" id="myTable">

    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->


      <thead>

        <a href="{{URL::to('couch/create')}}" title=""><h4>Adicionar treinador</h4></a>
        <a href="{{URL::to('couchclube')}}" title=""><h4>Ver clube</h4></a>

        <tr>
          <th>ID</th>
          <th>Nome</th> 
          <th>Apelido</th>  
          <th>Sexo</th>
          <th>Ano (nasc)</th>
          <th>Telefone</th>
          <th>email</th> 
   {{--        <th>Criado em</th>
    <th>Actualizado em</th>  --}}

  </tr>
</thead>
<tbody>
  @foreach($treinador as $post)
  <tr>
    <td>{{$post['id'        ]}}</td>
    <td>{{$post['nome'      ]}}</td>
    <td>{{$post['apelido'   ]}}</td>  
    <td>{{$post['sexo'      ]}}</td>
    <td>{{$post['ano'     ]}}</td> 
    <td>{{$post['telefone'  ]}}</td>
    <td>{{$post['email'     ]}}</td> 
      {{--     <td>{{$post['created_at']}}</td>
      <td>{{$post['updated_at']}}</td> --}}

      <td><a href="{{action('TreinadorController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
      <td>
        <form action="{{action('TreinadorController@destroy', $post['id'])}}" method="post">
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
