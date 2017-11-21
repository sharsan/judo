@extends('admin')
@section('content')
<title>Adicionar treinador a um clube</title>
<div class="container"> 
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <h2>Registrar treinador a um  clube</h2><br>
 <a href="{{URL::to('clube')}}" title=""><h4><- voltar</h4></a>

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

<form method="post" action="{{url('clube')}}">
  {{csrf_field()}}
  <!-- Nome -->

  <div class="row">
    <div class="form-group col-md-8">  
      
     <!-- Clube --> 

     <div class="col-md-10"> <br> 
      <label for="clube">Clube :
        <select id="clube" name="clube">

          @foreach($clube as $clb)
          <option value="{{$clb->nome}}">{{$clb->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 
    
    <!-- Treinador -->

    <div class="col-md-10"> <br> 
      <label for="treinador">Treinador :
        <select id="treinador" name="treinador">

          @foreach($treinador as $couch)
          <option value="{{$couch->nome}}">{{$couch->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 

  </div>

  <div class="form-group col-md-4"> 
    <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar treinador ao clube</button>  
    <!-- -->
  </div>
</form>

@endsection 