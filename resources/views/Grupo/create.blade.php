@extends('admin')
@section('content')
<title>Fase de grupos </title>
<div class="container">  
  <center><h3>Registrar competidores a um grupo</h3> </center> 
  <a href="{{URL::to('grupo')}}" title=""><h4>Grupos</h4></a><br>

  <h4>Lista de inscritos</h4> 
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


<table class="table table-striped"> 
  {{-- <a href="{{URL::to('inscrito/create')}}" title=""><h4>Inscrever competidor</h4></a> --}}
  <thead>
    <tr>
      <th>ID</th>
      <th>Atleta</th> 
      <th>Torneio</th> 
      <th>Sexo</th>
      <th>Escalão</th>  
 {{--      <th>Criado em</th>
  <th>Actualizado em</th> --}} 
</tr>
</thead>
<tbody>
  @foreach($inscrito as $post)
  <tr>
    <td>{{$post['id']}}</td>
    <td>{{$post['atleta']}}</td> 
    <td>{{$post['torneio']}}</td> 
    <td>{{$post['sexo']}}</td>
    <td>{{$post['escalao']}}</td>  
  {{--     <td>{{$post['created_at']}}</td>
  <td>{{$post['updated_at']}}</td> --}}
  @endforeach
</table>

<center><h2>Registrar grupo</h2> </center>  

<form method="post"  action="{{url('grupo')}}">

 {{csrf_field()}}   
 <!-- <div class="row">   -->
   <div class="row">
    <div class="form-group col-md-8">   
     <!-- Nome do campeonato  -->  

     <div class="col-md-10"> <br> 
      <label for="torneio"> Nome do Torneio :
        <select id="torneio" name="torneio">

          @foreach($torneio as $tor)
          <option value="{{$tor->nome}}">{{$tor->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 
    <!-- Escalao  --> 
    <div class="col-md-10"> <br> 
      <label for="escalao">Escalão de peso :
        <select id="escalao" name="escalao">

          @foreach($escalao as $esc)
          <option value="{{$esc->nome}}">{{$esc->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 

    <!-- Sexo --> 
    <div class="col-md-3">  <br> 
      <label for="sexo">Sexo :
        <input type="radio" class="form-check-input" name="sexo" value="M" checked></input> 
        M
        <input class="form-check-input" type="radio" name="sexo" id="F" value="F"></input> 
        F
      </label> 
    </div>

    <!-- juri : -->
    <div class="col-md-10"> <br> 
      <label for="juri"> Júri :
        <select id="juri" name="juri">

          @foreach($arbitro as $arb)
          <option value="{{$arb->nome}}">{{$arb->nome}} </option>
          @endforeach
        </select>
      </label>    
    </div> 


    <div class="row"> 

     <div class="form-group col-md-8">    
       <h3>Selecione os competidores</h3>   
       <!-- competidor A -->

       <label> 
         <a href="{{URL::to('inscrito/create')}}" title=""><h4>+ Inscrever competidores</h4></a>
       </label>   
       <div class="col-md-10"> <br> 
        <label for="atleta1"> Atleta A :
          <select id="atleta1" name="atleta1">

            @foreach($inscrito as $insc)
            <option value="{{$insc->atleta}}">{{$insc->atleta}} </option>
            @endforeach
          </select> 
        </label>    
      </div> 
      <!-- competidor B -->
      <div class="col-md-10"> 
        <label for="atleta2"> Atleta B :
         <select id="atleta2" name="atleta2">

          @foreach($inscrito as $insc2)
          <option value="{{$insc2->atleta}}">{{$insc2->atleta}} </option>
          @endforeach
        </select> 
      </label>
    </div> 
    <!-- competidor C -->
    <div class="col-md-10"> 
      <label for="atleta3"> Atleta C :
        <select id="atleta3" name="atleta3">

          @foreach($inscrito as $insc)
          <option value="{{$insc->atleta}}">{{$insc->atleta}} </option>
          @endforeach
        </select> 
      </label>
    </div>
    <!-- competidor D -->
    <div class="col-md-10"> 
      <label for="atleta4"> Atleta D :
        <select id="atleta4" name="atleta4">

          @foreach($inscrito as $insc)
          <option value="{{$insc->atleta}}">{{$insc->atleta}} </option>
          @endforeach
        </select> 
      </label>
    </div>
  </div> 



  <!-- Outros detalhes --> 

  <div class="form-group col-md-12">
   <br> <label for="descricao" class="col-sm-2 col-form-label col-form-label-sm">Outros detalhes

    <br> <br><textarea name="descricao" rows="8" cols="80"></textarea> 
  </label>
</div>

<div class="form-group col-md-4"> 
  <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar vencedores</button>  
</div>
</form>

@endsection 