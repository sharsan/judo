@extends('admin')
@section('content')
<title>Actualizando clube</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
<body>
  <div class="container">
    <h2>Editar clube do treinador</h2><br>
    <a href="{{URL::to('treinadorclube')}}" title=""><h4>Treinadores - clubes</h4></a>


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
    <p>{{URL::to('clube')}}</p>
  </div><br>
  @endif
  <form method="post" action="{{action('TreinadorClubesController@update', $id)}}"> 
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">  

    <!-- Clube --> 

    <div class="col-md-10"> <br> 
      <label for="clube_id">Clube :
        <select id="clube_id" name="clube_id">

          @foreach($clube_id as $clb)
          <option value="{{$clb->nome}}">{{$clb->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 

    <!-- Treinador -->

    <div class="col-md-10"> <br> 
      <label for="treinador_id">Treinador :
        <select id="treinador_id" name="treinador_id">

          @foreach($treinador_id as $treina)
          <option value="{{$treina->nome}}">{{$treina->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 


    <div class="col-md-12"> <br> 
      <button type="submit" class="btn btn-success" style="margin-left:38px">Actualizar</button> 
    </div>
  </form>
</div>
@endsection