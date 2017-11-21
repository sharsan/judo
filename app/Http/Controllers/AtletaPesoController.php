<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AtletaPeso;

use App\Atleta;


class AtletaPesoController extends Controller
{
  public function index()
  {
     $atletapeso = AtletaPeso::all()->toArray();

     $atleta_id = Atleta::all();
     return view('atletapeso.index', compact('atletapeso','id','atleta_id'));
 }

 public function create()
 { 
     $atletapeso = AtletaPeso::all();

     $atleta_id = Atleta::all();
     return view("atletapeso.create",compact('atletapeso','id','atleta_id')); 
 }  

 public function edit($id)
 {
     $atletapeso = AtletaPeso::find($id);

     $atleta_id = Atleta::all();

     return view('atletapeso.edit', compact('atletapeso','id','atleta_id')); 
 } 

 public function store(Request $request)
 {    
     $this->validate(request(), [
    // 'atleta_id' => 'required|unique:atletas|min:3,max:40',  
        'atleta_id' => 'required|min:3,max:40',
        'peso' => 'required|min:3,max:4',  
        'data' => 'required' 

    ]);
     $atletapeso = new AtletaPeso([
        'atleta_id' => $request->get('atleta_id'),  
        'peso' => $request->get('peso'),   
        'descricao' => $request->get('descricao')
               //campos de exigencia de valores
    ]);
     AtletaPeso::create($request->all());
     return back()->with('success', 'Pesagem adicionada com sucesso'); 

 }

 public function update(Request $request, $id)
 {     
     request()->validate(  
        [   
          'atleta_id' => 'required|min:3,max:40',  
          'peso' => 'required|min:3,max:4',  
          'data' => 'required' 
      ]); 
     AtletaPeso::find($id)->update($request->all());
     return redirect()->route('atletapeso/index')

     ->with('success','Pesagem actualizada com sucesso');  
 }

 public function destroy($id)
 {
     $atletapeso = AtletaPeso::find($id);
     $atletapeso->delete();

     return redirect('/peso');
 }  
//  public function show($id) 
//  { 
//   $atletapeso = AtletaPeso::find($id);

//   $atleta = Atleta::all();  

//   return view('atletapeso.show', ['atletapeso' =>$atletapeso,'atleta' =>$atleta]); 
// } 
}
