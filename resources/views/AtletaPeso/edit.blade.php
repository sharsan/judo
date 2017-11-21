@extends('admin')
@section('content')
<title>Actualizando peso</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
<body>
  <div class="container">
    <h2>Editar peso</h2><br>
    <a href="{{URL::to('atletapeso')}}" title=""><h4><- voltar</h4></a>


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
    <p>{{URL::to('atlpeso')}}</p>
  </div><br>
  @endif
  <form method="post" action="{{action('AtletaPesoController@update', $id)}}"> 
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">  

    <!-- Nome --> 

    <div class="col-md-4">
     <label for="peso"> Peso(kg) :</label>
     <input type="text" class="form-control" name="peso"placeholder="Ex: 50 "value="{{$atletapeso->peso}}">
   </input> 
 </div> 
 <div class="col-md-4">
   <label for="atleta_id"> Atleta :</label>
   <input type="text" class="form-control" name="atleta_id"placeholder="Ex: Marcia"value="{{$atletapeso->atleta_id}}">
 </input> 

 <div class="col-md-6">
   <label for="data"> Data :</label>
   <input type="date" class="form-control" name="data"placeholder="Ex: Marcia"value="{{$atletapeso->data}}">
 </input> 
</div> 
<!-- Outros detalhes --> 
      <!-- 
       <div class="col-md-12"> 
          <br>  <label for="descricao">Outros detalhes :
                
               <br><br>  <textarea name="descricao" rows="8" cols="90">{{$atletapeso->descricao}}</textarea> 
             </label> -->


             <div class="col-md-12"> <br> 
              <button type="submit" class="btn btn-success" style="margin-left:38px">Actualizar</button> 
            </div>
          </form>
        </div>
        @endsection