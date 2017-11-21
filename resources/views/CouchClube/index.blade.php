@extends('admin')
@section('content')
<title>Treinadores-Clubes </title>

<div class="container"> 
  <h2><center><th>Treinadores-Clubes</th></center> </h2>
  <table class="table table-striped">  
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
    </nav> 

    <div class="col-lg-4">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Insira a palavra a pesquisar..." aria-label="pesquisar">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button">Buscar!</button>
        </span>
      </div>
    </div>

    <div class="row">  <!--  este div inseri pra separa o Search com o restante -->
      <thead>    

        <div class="form-group col-md-4"> <br>
          <a href="{{URL::to('couchclube/create')}}" title=""><h4>Adicionar treinador a um clube</h4></a> 
          <a href="{{URL::to('clube')}}" title=""><h4>Clubes </h4></a>  
          <a href="{{URL::to('couch')}}" title=""><h4>Ver treinadores </h4></a>  
        </div>

        <thead> 
          <tr>
            <th>ID</th>
            <th>Clube</th>
            <th>Treinador</th> 
         {{--    <th>Criado em</th>
          <th>Actualizado em</th>   --}}
        </tr>
      </thead>
      <tbody>
        @foreach($couchclube as $post)
        <tr>
          <td>{{$post['id']}}</td>
          <td>{{$post['clube']}}</td> 
          <td>{{$post['treinador']}}</td> 
      {{--       <td>{{$post['created_at']}}</td>
      <td>{{$post['updated_at']}}</td>  --}}


      <td><a href="{{action('CouchClubeController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
      <td> 

        <form action="{{action('CouchClubeController@destroy', $post['id'])}}" method="post">
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
@endsection