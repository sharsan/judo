@extends('admin')
@section('content')
<title>Clubes </title>

<div class="container"> 
  <h2><center><th>Clubes</th></center> </h2>

  <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

  <table class="table table-striped" id="myTable">  
    <br> 
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
    </nav> 
    
    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->
      <thead>    

        <div class="form-group col-md-4"> <br>
          <a href="{{URL::to('clube/create')}}" title=""><h4>Adicionar clube</h4></a> 
          <a href="{{URL::to('atlclube')}}" title=""><h4>Ver clubes dos atletas</h4></a> 
          <a href="{{URL::to('treinadorclube')}}" title=""><h4>Ver clubes dos treinadores</h4></a> 
        </div>

        <thead> 
          <tr>
            {{-- <th>ID</th> --}}
            <th>Nome</th> 
           {{--  <th>Criado em</th>
            <th>Actualizado em</th>  --}} 
          </tr>
        </thead>
        <tbody>
          @foreach($clube as $post)
          <tr>
            {{-- <td>{{$post['id']}}</td> --}}
            <td>{{$post['nome']}}</td> 
            {{-- <td>{{$post['created_at']}}</td>
            <td>{{$post['updated_at']}}</td> --}} 


            <td><a href="{{action('ClubeController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
            <td> 

              <form action="{{action('ClubeController@destroy', $post['id'])}}" method="post">
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