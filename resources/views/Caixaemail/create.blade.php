@extends('master')
@section('content')
<html>
<head>

  <title> Envio de email </title>

  <link rel="stylesheet" href="/css/bootstrap.min.css">  

  <style>
  body{
    margin-top: 2em; 
  }
</style>

</head> 
<body>
  <div class="container">  


    <form method="post" action="{{url('mail')}}">
      {!! csrf_field() !!}
      <div class="form-group col-md-4">   

        <div class="form-group"> 
          <label for="user_name"> User Name: </label>
          <input type="text" name="user_name" id="user_name" class="form-control"> 
        </div>

        <div class="form-group">  
          <label for="sender_email"> Sender Email: </label>
          <input type="text" name="sender_email" id="sender_email" class="form-control">
        </input>
      </div>

      <div class="form-group"> 
        <label for="subject"> Assunto: </label>
        <input type="text" name="subject" id="subject" class="form-control"></input>
      </div> 

      <div class="form-group"> 
        <label for="recipient_name"> Recipient Name: </label>
        <input type="text" name="recipient_name" id="recipient_name" class="form-control"></input>
      </div>

      <div class="form-group"> 
       <label for="recipient_email"> Recipient Email: </label>
       <input type="text" name="recipient_email" id="recipient_email" class="form-control"></input>
     </div> 
   </div> 

   <div class="form-group col-md-12">
    <label for="content" class="col-sm-6col-form-label col-form-label-sm">Mensagem :

     <br><textarea name="content" rows="8" cols="80"></textarea> 
   </label>
 </div>
 <div class="form-group col-md-12">

   <input type="submit" value="Send" class="btn btn-primary">
 </center>  
</div>
  {{-- </div>
  </div> --}}
</body>
</html>
@yield('content') 
@endsection