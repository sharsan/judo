@extends('admin')
@section('content')
<title>Cinturões dos atletas </title>

<div class="container"> 
  <h3><center><th>Cinturões - Atletas</th></center> </h3>
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

        <a href="{{URL::to('atlcinto')}}" title=""><h4>Atletas</h4></a>

        <div class="form-group col-md-4"> <br>
          <a href="{{URL::to('cinturao/create')}}" title=""><h4>Adicionar cinturão</h4></a> 
        </div>

        <thead>
          <tr>
            <th>ID</th> 
            <th>Cinturão</th> 
     {{--        <th>Criado em</th>
      <th>Actualizado em</th>   --}}
    </tr>
  </thead>
  <tbody>
    @foreach($cinturao as $post)
    <tr>
      <td>{{$post['id']}}</td> 
      <td>{{$post['nome']}}</td> 
        {{--     <td>{{$post['created_at']}}</td>
        <td>{{$post['updated_at']}}</td>  --}}


        <td><a href="{{action('CinturaoController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
        <td> 

          <form action="{{action('CinturaoController@destroy', $post['id'])}}" method="post">
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