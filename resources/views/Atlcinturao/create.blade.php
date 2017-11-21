@extends('admin')
@section('content')
<title>Atribuir cinturão a atleta</title>
<div class="container"> 
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <h2>Atribuir cinturão a atleta</h2><br>
 <a href="{{URL::to('atlcinto')}}" title=""><h4>Cinturões</h4></a>
 
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

<form method="post" action="{{url('atlcinto')}}">
  {{csrf_field()}}
  
  
  <div class="row">
    <div class="form-group col-md-8">  

      <!-- Nome --> 
      <div class="col-md-10"> <br> 
        <label for="atleta">Atleta :
          <select id="atleta" name="atleta">

            @foreach($atleta as $atl)
            <option value="{{$atl->nome}}">{{$atl->nome}} </option>
            @endforeach
          </select>
        </label>    
      </div> 
      <!-- Data da graduação -->  

      <div class="col-md-12"> 
       <label for="data">Data da graduação :
         <meta charset="utf-8"> 
         <meta name="data" content="referrer"> 
         <input type="date" placeholder="Ex: 2016-08-29 10:10:40">   
       </label> 
     </div>  
     <!-- Cinturão --> 

     <div class="col-md-10"> <br> 
      <label for="cinturao">Cinturão :
        <select id="cinturao" name="cinturao">

          @foreach($cinturao as $cnt)
          <option value="{{$cnt->nome}}">{{$cnt->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 

  </div> 


  <!-- Outros detalhes --> 

  <div class="form-group col-md-12">
   <br> <label for="descricao" class="col-sm-2 col-form-label col-form-label-sm">Outros detalhes

    <br> <br><textarea name="nota" rows="8" cols="80"></textarea> 
  </label>
</div>

<div class="form-group col-md-4"> 
  <button type="submit" class="btn btn-success" style="margin-left:38px">Atribuir cinturão a atleta</button>  
  <!-- -->
</div>
</form>

@endsection 