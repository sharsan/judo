@extends('admin')
@section('content')
<title>Escalões </title>

<div class="container"> 
  <h3><center><th>Escalões</th></center> </h3>


  <input class="form-control" type="text" placeholder="Pesquisar por Nome" onkeyup="filtrar()" id="txtPesk" style="margin-top: 20px; width: 410px; height: 35px">

  <table class="table table-striped" id="myTable">   
    
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

        <a href="{{URL::to('atleta/create')}}" title=""><h4><- voltar</h4></a>  
        <div class="form-group col-md-4"> <br>
          <a href="{{URL::to('atlescalao/create')}}" title=""><h4>Adicionar escalão</h4></a> 
        </div>
        
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th> 
            <th>Criado em</th>
            <th>Actualizado em</th>  
          </tr>
        </thead>
        <tbody>
          @foreach($atlescalao as $post)
          <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['nome']}}</td> 
            <td>{{$post['created_at']}}</td>
            <td>{{$post['updated_at']}}</td> 

            
            <td><a href="{{action('AtlEscalaoController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
            <td> 
              
              <form action="{{action('AtlEscalaoController@destroy', $post['id'])}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Apagar</button>
              </form>
            </td>
          </div>  <!--  este div inseri pra separa o Search com o restante -->

        </tr>
     