@extends('admin')
@section('content')
<title>Registro do peso do atleta</title>
<div class="container"> 
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <h2>Registrar peso do atleta</h2><br>
 <a href="{{URL::to('peso')}}" title=""><h4>Pesagem</h4></a>

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

<form method="post" action="{{url('atlpeso')}}">
  {{csrf_field()}}


  <div class="row">
    <div class="form-group col-md-8">  

      <!-- Data da pesagem -->  

      <div class="col-md-12"> 
       <label for="data">Data da pesagem :
         <meta charset="utf-8"> 
         <meta name="data" content="referrer"> 
         <input type="date" placeholder="Ex: 2017-10-29 08:10:43">   
       </label> 
     </div> 
   </div>    


   <!-- Nome do campeonato  -->  
   <div class="form-group col-md-8">   

     <div class="col-md-8"> <br> 
      <label for="atleta">Atleta :
        <select id="atleta" name="atleta">

          @foreach($atleta as $atl)
          <option value="{{$atl->nome}}">{{$atl->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 
  </div> 


  <!-- Peso -->
  <div class="form-group col-md-8">   
   <div class="col-md-3"><br>
    <label for="peso"> Peso (Kg) :</label>
    <input type="text" class="form-control" name="peso"></input> 
  </div>
</div> 


<!-- Outros detalhes --> 

<div class="form-group col-md-12">
 <br> <label for="descricao" class="col-sm-2 col-form-label col-form-label-sm">Outros detalhes

  <br> <br><textarea name="nota" rows="8" cols="80"></textarea> 
</label>
</div>

<div class="form-group col-md-4"> 
  <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar clube</button>  
  <!-- -->
</div>
</form>

@endsection 