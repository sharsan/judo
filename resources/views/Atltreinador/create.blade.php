@extends('admin')
@section('content')
<title>Adicionar treinador</title> 
<div class="container">
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <h2>Registrar treinador</h2><br>
    <a href="{{URL::to('atltreinador')}}" title=""><h4>Atletas alocados</h4></a>
    
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
    <p>{{ \Session::get('success') }}</p>
  </div><br>
  @endif

  <form method="post" action="{{url('atltreinador')}}">
    <div class="form-group row">
     {{csrf_field()}}   

     <div class="row">
      <div class="form-group col-md-6">  

        <!-- Nome --> 
        <div class="col-md-10"> <br> 
          <label for="atleta_id">Atleta :
            <select id="atleta_id" name="atleta_id">

              @foreach($atleta_id as $atl)
              <option value="{{$atl->nome}}">{{$atl->nome}} </option>
              @endforeach
            </select>
          </label>    
        </div> 
        <!-- Nome --> 
        <div class="col-md-10"> <br> 
          <label for="treinador_id">Treinador :
            <select id="treinador_id" name="treinador_id">

              @foreach($treinador_id as $atl)
              <option value="{{$atl->nome}}">{{$atl->nome}} </option>
              @endforeach
            </select>
          </label>    
        </div>   
      </div> 

      <!-- Outros detalhes --> 

      <div class="form-group col-md-12">
        <label for="descricao" class="col-sm-2 col-form-label col-form-label-sm">Outros detalhes

          <br> <br><textarea name="nota" placeholder=" Ex: Devido a mudança de residencia, fica adequado dar continuidade aos treinos no... " rows="8" cols="80"></textarea> 
        </label>
      </div>

      <div class="form-group col-md-4"> 
        <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar treinador</button>  
        <!-- -->
      </div>
    </form>

    @endsection 