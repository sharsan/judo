
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar escalao </title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <h2>Editar escalão</h2><br  />
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br>
    @endif

    <form method="post" action="{{action('AttEscalaoController@updateAttEscalaos')}}">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="col-md-4"> 
          <div class="form-group col-md-4">
            <label for="escalao">Nome:
            </label>
            <input type="text" class="form-control" name="escalao" value="{{$attescalao->escalao}}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4"> 
          <div class="form-group col-md-4">
            <label for="atleta">Atleta:
            </label>
            <input type="text" class="form-control" name="atleta" value="{{$attescalao->atleta}}">
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-left:38px">Actualizar escalao</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>