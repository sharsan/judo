<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TreinadorClubes; 

use App\Clube; 
use App\Treinador; 

class TreinadorClubesController extends Controller
{ 
  public function index()
  {
   $treinadorclube = TreinadorClubes::all()->toArray();

   $treinador_id = Treinador::all();
   $clube_id = Clube::all();

   return view('treinadorclube.index', compact('treinadorclube','treinador_id','clube_id'));
 }

 public function create()
 {
   $treinadorclube = TreinadorClubes::all();

   $treinador_id = Treinador::all();
   $clube_id = Clube::all();

   return view("treinadorclube.create",compact('treinadorclube','treinador_id','clube_id')); 
 } 

 public function edit($id)
 {
   $treinadorclube = TreinadorClubes::find($id);

   $treinador_id = Treinador::all(); 
   $clube_id = Clube::all(); 

   return view('treinadorclube.edit', compact('treinadorclube','id','treinador_id','clube_id')); 
 } 

 public function update(Request $request, $id)
 {          
   request()->validate(  
    [   
      'treinador_id' => 'required',
      'clube_id' => 'required' 
    ]); 
   TreinadorClubes::find($id)->update($request->all());
   return redirect()->route('treinadorclube.index')

   ->with('success','Clube do treinador actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
   $this->validate(request(), [ 
    'treinador_id' => 'required',
    'clube_id' => 'required' 
  ]);
   $treinadorclube = TreinadorClubes::all();([
    'treinador_id' => $request->get('treinador_id'), 
    'clube_id' => $request->get('clube_id') 
               //campos de exigencia de valores
  ]);
   TreinadorClubes::create($request->all());
   return back()->with('success', 'Clube do treinador adicionado com sucesso'); 
 } 
 public function destroy($id)
 {
   $treinadorclube = TreinadorClubes::find($id);
   $treinadorclube->delete();

   return redirect('/treinadorclube');
 }  
}
