@extends('admin')
@section('content')
<title>Emails </title>

<div class="container"> 
  <h3><center><th>Emails </th></center> </h3>
  <table class="table table-striped">  
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
    </nav> 

    {{-- <a href="{{URL::to('caixaemail/create')}}" title=""><h4><- voltar</h4></a>  --}}
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
          <a href="{{URL::to('mail/create')}}" title=""><h4>Escrever email</h4></a> 
        </div>
        
        <thead>
          <tr>
            {{-- <th>ID</th> --}}
            <th>Emissor</th>  
            <th>Assunto</th>  
            <th>Conteúdo</th>    
            <th>Data criado</th>     
          </tr>
        </thead>
        <tbody>
          @foreach($caixaemail as $post)
          <tr>
            {{-- <td>{{$post['id']}}</td>  --}}
            <td>{{$post['user_name']}}</td>   
            <td>{{$post['subject']}}</td> 
            <td>{{$post['content']}}</td>  
            <td>{{$post['created_at']}}</td> 

            <td><a href="{{action('CaixaemailController@edit', $post['id'])}}" class="btn btn-warning">Editar</a></td>
            <td> 

              <form action="{{action('CaixaemailController@destroy', $post['id'])}}" method="post">
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