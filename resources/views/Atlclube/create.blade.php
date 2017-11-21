@extends('admin')
@section('content')
<title>Adicionar clube</title>
<div class="container"> 
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <h2>Registrar clube</h2><br>
 <a href="{{URL::to('clube')}}" title=""><h4>Clubes</h4></a>

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

<form method="post" action="{{url('atlclube')}}">
  {{csrf_field()}}
  <!-- Nome -->

  <div class="row">
    <div class="form-group col-md-8">  

      <!-- Nome --> 
      <div class="col-md-10"> <br> 
        <label for="atleta">Nome :
          <select id="atleta" name="atleta">

            @foreach($atleta as $atl)
            <option value="{{$atl->nome}}">{{$atl->nome}} </option>
            @endforeach
          </select>
        </label>    
      </div> 

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

    </div> 

    <!-- Outros detalhes --> 

    <div class="form-group col-md-12">
     <br> <label for="descricao" class="col-sm-2 col-form-label col-form-label-sm">Outros detalhes

      <br> <br><textarea name="nota" rows="8" cols="80"></textarea> 

    </div>

    <div class="form-group col-md-4"> 
      <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar clube</button>  
      <!-- -->
    </div>
  </form>

  @endsection 