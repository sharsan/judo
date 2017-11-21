@extends('admin')
@section('content')
<title>Qualificacoes</title>
<div class="container"> 
 <h3><center><th>Qualificações</th></center> </h3>

 <a href="{{URL::to('grupo')}}" title=""><h4> Fase de grupos</h4></a>

 <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

 <table class="table table-striped" id="myTable">  
  <br> 

  <thead>   <a href="{{URL::to('finalista/create')}}" title=""><h4>+ adicionar finalistas</h4></a>


   <thead>
    <tr>
      <th>ID</th> 
      <th>Torneio</th> 
      <th>Escalão</th> 
      <th>1º Lugar</th>
      <th>2º Lugar</th> 
      <th>3º Lugar</th>
      <th>Júri</th>
      <th>Criado em</th>
      <th>Actualizado em</th>  
    </tr>
  </thead>
  <tbody>
    @foreach($qualificacoes as $post)
    <tr>
      <td>{{$post['id']}}</td> 
      <td>{{$post['torneio']}}</td>
      <td>{{$post['escalao']}}</td>
      <td>{{$post['primeiro']}}</td>
      <td>{{$post['segundo']}}</td> 
      <td>{{$post['terceiro']}}</td> 
      <td>{{$post['juri']}}</td>
      <td>{{$post['created_at']}}</td>
      <td>{{$post['updated_at']}}</td> 


      <td><a href="{{action('QualificacoesController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
      <td>
        <form action="{{action('QualificacoesController@destroy', $post['id'])}}" method="post">
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