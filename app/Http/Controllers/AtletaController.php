<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;  
use App\Atleta; 

// use App\AtlPeso; 

class AtletaController extends Controller
{   

  public function index()
  {
    $atleta = Atleta::all()->toArray(); 

    return view('atleta.index', compact('atleta'));
  } 

  public function create()
  {              
   $atleta =Atleta::all();   

   return view("atleta.create", compact('atleta'));
 }   

 public function edit($id)
 { 
   $atleta= Atleta::find($id); 

   return view('atleta.edit', compact('atleta','id'));
 } 

 public function update(Request $request, $id)
 { 
   request()->validate(  
    [   
     'nome' => 'required|unique:atletas|min:3,max:40',     
   ]); 
   Atleta::find($id)->update($request->all());
   return redirect()->route('atleta.index')

   ->with('success','Atleta actualizado com sucesso'); 
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
       'nome' => 'required|unique:atletas|min:3,max:40', 
     ]);
   }
   Atleta::create($request->all());
   return back()->with('success', 'Atleta adicionado com sucesso');
   
        // return redirect('/atleta');
 }  

//  public function show($id) 
//  { 
//   $atleta = Atleta::find($id);

//   return view('atleta.show',compact('atleta')); 
// } 



 public function show($id) 
 { 
  $atleta = Atleta::find($id); 

  return view('atleta.show', ['atleta' =>$atleta]); 
} 


public function destroy($id)
{
  $atleta = Atleta::find($id);
  $atleta->delete();

  return redirect('atleta');
} 

} 