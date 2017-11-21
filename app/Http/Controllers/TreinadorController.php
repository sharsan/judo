<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Treinador;
use App\Clube;

class TreinadorController extends Controller
{
 public function index()
 {
   $treinador =Treinador::all(); 

   return view("treinador.index",compact('treinador'));
 }

 public function create()
 {   
  $treinador =Treinador::all(); 

  $clube =Clube::all();  

  return view("treinador.create",['clube'=>$clube]);  
}  

public function edit($id)
{
 $treinador = Treinador::find($id);

 $clube =Clube::all(); 
 return view('treinador.edit',compact('treinador','id','clube'));
}

public function store(Request $request)
{    
  $existe=$request->get('ano')!="";

  if($existe==true){
   $this->validate(request(), [
    'ano'=> 'numeric|min:1960|max:2003',  
  ]);
 }
 else{  

   $this->validate(request(), [
     'nome' => 'required|unique:treinadors|min:3,max:40',
   ]);
 }

 $treinador = new Treinador([
  'nome' => $request->get('nome'),
  'apelido' => $request->get('apelido'),   
  'sexo' => $request->get('sexo'), 
  'ano' => $request->get('ano'), 
  'telefone' => $request->get('telefone'),
  'email' => $request->get('email'), 
  'descricao' => $request->get('descricao')

]);
 Treinador::create($request->all());
 return back()->with('success', 'Treinador adicionado com sucesso'); 

} 

public function update(Request $request, $id)
{     
 request()->validate(  
  [   
   'nome' => 'required|unique:treinadors|min:3,max:40',
 ]); 
 Treinador::find($id)->update($request->all());
 return redirect()->route('treinador.index')

 ->with('success','Treinador actualizado com sucesso');  
}   

public function destroy($id)
{
 $treinador = Treinador::find($id);
 $treinador->delete();

 return redirect('treinador');
} 
}