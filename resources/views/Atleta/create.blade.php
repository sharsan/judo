@extends('admin')
@section('content')
<title>Adicionar atleta </title>
<div class="container"> 
  <h2>Registrar atleta</h2><br>
  <a href="{{URL::to('atleta')}}" title=""><h4>Atletas</h4></a>   
  <style>

</style>
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

<form method="post" action="{{url('atleta')}}">

  {{csrf_field()}} 

  <div class="row">
    <div class="form-group col-md-6">  

      <!-- Apelido -->
      <div class="col-md-6">
        <label for="apelido"> Apelido:</label>
        <input type="text" class="form-control" name="apelido" placeholder="Ex: Tembe"></input> </div>

        <!-- Nome -->
        <div class="col-md-12">
          <label for="nome"> Nome :</label>
          <input type="text" class="form-control" name="nome" placeholder="Ex: Marcia"></input><br></div>

        </div>
        <div class="form-group col-md-10">    
         <!-- Fotografia   -->
<!--             <div class="col-md-3"> 
               <label for="fotografia">Fotografia 
                 <input type="file" class="form-control-file" id="fotografia">
               </label> 
             </div> -->
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
               <input type="number" class="form-control" name="ano"></input> 
             </label>
           </div>  
         </div>
         <div class="form-group col-md-10">    
           <!-- telefone --> 
           <div class="col-md-3">                
             <label for="telefone"> telefone:</label>
             <input type="int" class="form-control" name="telefone" placeholder="Ex: 821002005 "></input></div>  

             <div class="col-md-6">         
              <!-- email --> 
              <label for="email"> email: </label> 
              <input type="text" class="form-control" name="email" placeholder="Ex: marciatembe@gmail.com "></input>
            </div>  

          </div>  
          <!-- Outros detalhes --> 

          <div class="form-group col-md-12">
            <label for="descricao" class="col-sm-4 col-form-label col-form-label-sm">Outros detalhes

              <br> <br><textarea name="descricao" placeholder=" Ex: Melhor recorde pessoal: 1º lugar em 2016... " rows="8" cols="80"></textarea> 
            </label>
          </div>

          <div class="form-group col-md-4"> 
            <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar atleta</button>  
            <!-- -->
          </div>
        </form>

        @endsection