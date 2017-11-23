<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AtlTreinador; 

use App\Atleta;  
use App\Treinador;  

class AtlTreinadorController extends Controller
{ 
  public function index()
  {
     $atltreinador = AtlTreinador::all()->toArray();

     $atleta_id = Atleta::all(); 
     $treinador_id = Treinador::all(); 

     return view('atltreinador.index', compact('atltreinador','atleta_id','treinador_id'));
 } 

 public function create()
 {
     $atltreinador = AtlTreinador::all(); 

     $atleta_id = Atleta::all();  
     $treinador_id = Treinador::all(); 
     return view("atltreinador.create", compact('atltreinador','atleta_id','treinador_id'));   
 }  

 public function edit($id)
 {
     $atltreinador = AtlTreinador::find($id);

     $atleta_id = Atleta::all(); 
     $treinador_id = Treinador::all(); 

     return view('atltreinador.edit', compact('atltreinador','id','atleta_id','treinador_id')); 
 } 

 public function update(Request $request, $id)
 {          
     request()->validate(  
        [   
          'atleta_id' => 'required',
          'treinador_id' => 'required' 
      ]); 
     AtlTreinador::find($id)->update($request->all());
     return redirect()->route('atltreinador.index')

     ->with('success','Escalao actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
     $this->validate(request(), [ 
        'atleta_id' => 'required',
        'treinador_id' => 'required'  
    ]);
     $atltreinador = new AtlTreinador([
        'atleta_id' => $request->get('atleta_id'), 
        'treinador_id' => $request->get('treinador_id') 
               //campos de exigencia de valores
    ]);
     AtlTreinador::create($request->all());
     return back()->with('success', 'Atleta alocado ao treinador com sucesso'); 
 }


 public function destroy($id)
 {
     $atltreinador = AtlTreinador::find($id);
     $atltreinador->delete();

     return redirect('/atltreinador');
 }  
}
