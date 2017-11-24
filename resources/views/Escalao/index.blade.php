@extends('admin')
@section('content')
<title>Escalões </title>

<div class="container"> 
  <h3><center><th>Escalões</th></center> </h3><br>

  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
  </nav>

  
  <table class="table table-striped" id="myTable">  

    <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

    
    
    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->
      <thead>    

        <div class="form-group col-md-4"> <br>
          <a href="{{URL::to('atlesc/create')}}" title=""><h4>Atribuir escalão a atleta</h4></a>  
          <a href="{{URL::to('escalao/create')}}" title=""><h4>Adicionar escalão</h4></a> 
        </div>
        
        <thead>
          <tr>
            {{-- <th>ID</th> --}}
            <th>Nome</th> 
            <th>Criado em</th>
            <th>Actualizado em</th>  
          </tr>
        </thead>
        <tbody>
          @foreach($escalao as $post)
          <tr>
            {{-- <td>{{$post['id']}}</td> --}}
            <td>{{$post['nome']}}</td> 
            <td>{{$post['created_at']}}</td>
            <td>{{$post['updated_at']}}</td> 

            
            <td><a href="{{action('EscalaoController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
            <td> 

              <form action="{{action('EscalaoController@destroy', $post['id'])}}" method="post">
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


