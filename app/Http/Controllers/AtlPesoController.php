<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\AtlPeso;

use App\Atleta;

class AtlPesoController extends Controller
{ 

  public function index()
  {
    $atlpeso = AtlPeso::all()->toArray(); 

    $atleta = Atleta::all(); 

    return view('peso.index', compact('atlpeso','atleta'));
  } 

  public function create()
  {              
   $atlpeso =AtlPeso::all();

   $atleta = Atleta::all();    

   return view("atlpeso.create", compact('atlpeso','atleta'));
 }   

 public function edit($id)
 { 
   $atlpeso= AtlPeso::find($id); 

   $atleta = Atleta::all();    

   return view('atlpeso.edit', compact('atlpeso','id','atleta'));
 } 

 public function update(Request $request, $id)
 { 
   request()->validate(  
    [   
      'peso' => 'required|unique:pesos|min:3,max:40', 
      'atleta' => 'required|unique:atletas|min:3,max:40'      
    ]); 
   AtlPeso::find($id)->update($request->all());
   return redirect()->route('atlpeso.index')

   ->with('success','Peso actualizado com sucesso'); 
 }

 public function store(Request $request)
 {      
   $existe=$request->get('ano')!="";

   if($existe==true){
     $this->validate(request(), [
      'ano'=> 'numeric|min:1960|max:2014',  
    ]);
   }
   else{  

     $this->validate(request(), [
       'nome' => 'required|unique:atlPesos|min:3,max:40', 
     ]);
   }
   AtlPeso::create($request->all());
   return back()->with('success', 'Peso adicionado com sucesso');
   
        // return redirect('/peso');
 }  

 public function show($id) 
 { 
  $atlpeso = AtlPeso::find($id);

  return view('atlpeso.show',compact('peso')); 
} 


public function destroy($id)
{
  $atlpeso = AtlPeso::find($id);
  $atlpeso->delete();

  return redirect('peso');
} 

} 