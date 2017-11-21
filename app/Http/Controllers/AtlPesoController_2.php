<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AtlPeso;

use App\Atleta;

class AtlPesoController extends Controller
{
  public function index()
  {
   $atlpeso = AtlPeso::all()->toArray();
   
   return view('atlpeso.index', compact('atlpeso'));
 }

 public function create()
 {
   $atlpeso = new AtlPeso();

   $atleta = Atleta::all();
   return view("atlpeso.create",compact('atlpeso','atleta')); 
 }  
 
 public function edit($id)
 {
   $atlpeso = AtlPeso::find($id);
   
   $atleta = Atleta::all();
   
   return view('atlpeso.edit', compact('atlpeso','id','atleta')); 
 } 

 public function store(Request $request)
 {   

   $existe=$request->get('peso')!="";

   if($existe==true){
     $this->validate(request(), [
      'peso'=> 'numeric|min:15|max:120',  
    ]);
   }
   else{  

     $this->validate(request(), [
    // 'atleta' => 'required|unique:atletas|min:3,max:40',  
      'atleta' => 'required|min:3,max:40',  
      'peso' => 'required',  
      'data' => 'required' 

    ]);
     $atlpeso = new AtlPeso([
      'atleta' => $request->get('atleta'),  
      'peso' => $request->get('peso'),   
      'descricao' => $request->get('descricao')
               //campos de exigencia de valores
    ]);
     AtlPeso::create($request->all());
     return back()->with('success', 'Pesagem adicionada com sucesso'); 

   }  
 }

 public function update(Request $request, $id)
 {     
   request()->validate(  
    [   
      'atleta' => 'required|min:3,max:40',  
      'peso' => 'required|min:3', 
      'data' => 'required' 
    ]); 
   AtlPeso::find($id)->update($request->all());
   return redirect()->route('atlpeso/index')

   ->with('success','Pesagem actualizada com sucesso');  
 }

 public function destroy($id)
 {
   $atlpeso = AtlPeso::find($id);
   $atlpeso->delete();

   return redirect('/peso');
 }  
}
