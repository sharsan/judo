@extends('admin')
@section('content')
<title>Editar luta </title>
<div class="container"> 
  <h2>Editar vencedores do grupo B do escalão</h2><br> 
  <a href="{{URL::to('tatami12')}}" title=""><h4><- voltar</h4></a>
  
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

{{-- <form method="post"  action="{{url('tatami12')}}">  --}}
 <a href="{{URL::to('tatami12/create')}}" title=""><h4>+ Registrar outro vencedor de luta</h4></a>   

 <table class="table table-striped">  
  <thead>   

    <center><h3> Competidores do grupo B</h3>  </center>
    <thead>
      <tr>
        <th>ID</th> 
        <th>Torneio</th> 
        <th>Atleta 1</th>
        <th>Escalão</th> 
        <th>Atleta 2</th> 
        <th>Sexo</th>  
      </tr>
    </thead>
    <tbody>
      @foreach($grupo as $post)
      <tr>
        <td>{{$post['id']}}</td> 
        <td>{{$post['torneio']}}</td>
        <td>{{$post['atleta1']}}</td>
        <td>{{$post['escalao']}}</td>
        <td>{{$post['atleta2']}}</td> 
        <td>{{$post['sexo']}}</td>
        @endforeach
      </tbody>  
    </table> 

    <form method="post" action="{{action('Tatami12Controller@update', $id)}}">
      {{csrf_field()}}   
      <!-- <div class="row">   -->
       <div class="row">
        <div class="form-group col-md-8">   
         <!-- Nome do campeonato  -->  

         <h2>Editar vencedores </h2>   
         <label for="torneio"> Nome do Torneio :
          <select id="torneio" name="torneio">

            @foreach($torneio as $tor)
            <option value="{{$tor->nome}}">{{$tor->nome}} </option>
            @endforeach
          </select>
        </label>    
      </div> 

      <!-- Escalao  -->  
      <div class="form-group col-md-8">   
       <label for="escalao">Escalão de peso : 
        <select id="escalao" name="escalao">

          @foreach($escalao as $esc)
          <option value="{{$esc->nome}}">{{$esc->nome}} </option>
          @endforeach   
        </select> 
      </label>   
    </div> 

    {{-- Sexo --}}

    <div class="form-group col-md-8"> 
      <label for="sexo">Sexo :
        <input type="radio" class="form-check-input" name="sexo" value="M" checked></input> 
        M
        <input class="form-check-input" type="radio" name="sexo" id="F" value="F"></input> 
        F
      </label> 
    </div>

    <!-- juri : -->
    <div class="col-md-10">  
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
       <h3>Selecione os atletas</h3>   
       <!-- 1º lugar -->

       <div class="col-md-10"> <br> 
        <label for="atleta1"> Atleta 1:
          <select id="atleta1" name="atleta1">

            @foreach($grupo as $grp)
            <option value="{{$grp->atleta1}}">{{$grp->atleta1}} </option>
            @endforeach
          </select>
        </label>    
      </div> 
      <!-- 2º lugar -->
      <div class="col-md-10"> 
        <label for="atleta2"> Atleta 2:
         <select id="atleta2" name="atleta2">

          @foreach($grupo as $grp)
          <option value="{{$grp->atleta2}}">{{$grp->atleta2}} </option>
          @endforeach
        </select> 
      </label>
    </div>  
    <!-- Vencedor12 -->
    <div class="col-md-10"> 
      <label for="vencedor12"> Vencedor:
       <select id="vencedor12" name="vencedor12">

        @foreach($inscrito as $insc)
        <option value="{{$insc->atleta}}">{{$insc->atleta}} </option>
        @endforeach
      </select> 
    </label>
  </div> 
  <!-- Vencido -->
  <div class="col-md-10"> 
    <label for="vencido"> Vencido:
     <select id="vencido" name="vencido">

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

  <br> <br><textarea name="descricao" rows="8" cols="80"value="{{$tatami12->descricao}}"></textarea> 
</label>
</div>

<div class="form-group col-md-4"> 
  <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar luta</button>  
</div>  
</thead>
</form>

@endsection 