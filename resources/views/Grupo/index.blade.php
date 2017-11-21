@extends('admin')
@section('content')
<title>Grupos</title>
<div class="container">  
  <h3><center><th>Grupos</th></center> </h3>

  <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

  <table class="table table-striped" id="myTable">  
    <br>  

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
    </nav>  
    
    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->
      <thead>    

        <div class="form-group col-md-4"> <br>
         <a href="{{URL::to('grupo/create')}}" title=""><h4> Adicionar grupo</h4></a> 
         <a href="{{URL::to('tatami12')}}" title=""><h4> Ver grupo A</h4></a>  
         <a href="{{URL::to('tatami34')}}" title=""><h4> Ver grupo B</h4></a> 
         
         <thead>
          <tr>
            {{-- <th>ID</th>   --}}
            <th>Torneio</th> 
            <th>Escalão</th>   
            <th>Atleta A </th>
            <th>Atleta B </th>
            <th>Atleta C </th>
            <th>Atleta D </th>
            <th>Júri</th>
         {{--    <th>Criado em</th>
            <th>Actualizado em</th>  --}} 
          </tr>
        </thead>
        <tbody>
          @foreach($grupo as $post)
          <tr>
            {{-- <td>{{$post['id']}}</td>  --}}
            <td>{{$post['torneio']}}</td>
            <td>{{$post['escalao']}}</td> 
            <td>{{$post['atleta1']}}</td>
            <td>{{$post['atleta2']}}</td>
            <td>{{$post['atleta3']}}</td>
            <td>{{$post['atleta4']}}</td>
            <td>{{$post['juri']}}</td>
         {{--    <td>{{$post['created_at']}}</td>
         <td>{{$post['updated_at']}}</td> --}} 

            
            <td><a href="{{action('GrupoController@edit', $post['id'])}}" class="btn btn-success">Editar</a></td>
            <td>
              <form action="{{action('GrupoController@destroy', $post['id'])}}" method="post">
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