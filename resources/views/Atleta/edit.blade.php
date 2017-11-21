@extends('admin')
@section('content')
<title>Actualizando atleta </title>    
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <h2>Editar atleta</h2> 
    <a href="{{URL::to('atleta')}}" title=""><h4><- voltar</h4></a>   

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
       @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div><br>
   @endif

   @if (\Session::has('success'))
   <div class="alert alert-success">
    <!-- <p>{{ \Session::get('success') }}</p> -->
    <p>{{URL::to('atleta')}}</p>       
  </div><br>
  @endif 
  
  <form method="post" action="{{action('AtletaController@update', $id)}}">
    {{csrf_field()}} 
    <input name="_method" type="hidden" value="PATCH"> 

    <div class="row">
      <div class="form-group col-md-6">  

        <!-- Apelido -->
        <div class="col-md-6">
          <label for="apelido"> Apelido:</label>
          <input type="text" class="form-control" name="apelido" placeholder="Ex: Tembe" value="{{$atleta->apelido}}"></input></div>
          
          <!-- Nome -->
          <div class="col-md-12">
            <label for="nome"> Nome :</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Marcia" value="{{$atleta->nome}}"></input></div>
            
          </div>
          <div class="form-group col-md-10">    
           <!-- Fotografia   -->
       {{--     <div class="col-md-3"> 
             <label for="fotografia">Fotografia 
               <input type="file" class="form-control-file" id="fotografia">
             </label> 
           </div> --}}
           <!-- Sexo --> 
           <div class="col-md-3">  <br> 
            <label for="sexo">Sexo :
              <input type="radio" class="form-check-input" name="sexo" value="M" checked></input> 
              M
              <input class="form-check-input" type="radio" name="sexo" id="F" value="F"></input> 
              F
            </label> 
          </div>
          
          <!-- Idade  -->
          
          <div class="col-md-2"> 
           <label for="ano"> Ano de nascimento:
             <input type="number" class="form-control" name="ano" value="{{$atleta->ano}}"></input> 
           </label>
         </div>  
       </div>
       <div class="form-group col-md-10">    
         <!-- telefone --> 
         <div class="col-md-3">                
           <label for="telefone"> telefone:</label>
           <input type="int" class="form-control" name="telefone" placeholder="Ex: 821002005 " value="{{$atleta->telefone}}"></input></div>  
           
           <div class="col-md-6">         
             <!-- email --> 
             <label for="email"> email: </label> 
             <input type="text" class="form-control" name="email" placeholder="Ex: marciatembe@gmail.com " value="{{$atleta->email}}"></input>
           </div> 
           
         </div> 
         
         <!-- Outros detalhes --> 

         <div class="col-md-8">  
          <label for="descricao">Outros detalhes :

            <br><br>    <textarea name="descricao" placeholder=" Ex: Iniciou a carreira aos seus 6anos de vida " rows="8" cols="90">{{$atleta->descricao}}</textarea> </label>   
            <button type="submit" class="btn btn-success" style="margin-left:38px">Actualizar</button> 
          </div>
        </form>
      </div>
      @endsection