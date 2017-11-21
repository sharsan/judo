<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AtlCategoria;

use App\Atleta;
use App\Categoria;

class AtlCategoriaController extends Controller
{
  public function index()
  {
     $atlcategoria = AtlCategoria::all()->toArray();

     $atleta = Atleta::all();  
     $categoria = Categoria::all();  

     return view('atlcategoria.index', compact('atlcategoria','atleta','categoria'));
 } 

 public function create()
 {
     $atlcategoria = AtlCategoria::all();  

     $atleta = Atleta::all();   
     $categoria = Categoria::all();  

     return view("atlcategoria.create", compact('atlcategoria','atleta','categoria'));   
 }   

 public function edit($id)
 {
     $atlcategoria = AtlCategoria::find($id);

     $atleta = Atleta::all();  
     $categoria = Categoria::all();  

     return view('atlcategoria.edit', compact('atlcategoria','id','atleta','categoria')); 
 } 

 public function update(Request $request, $id)
 {          
     request()->validate(  
        [   
          'atleta' => 'required',
          'categoria' => 'required' 
      ]); 
     AtlCategoria::find($id)->update($request->all());
     return redirect()->route('atlcategoria.index')

     ->with('success','Atribuição de cinto actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
     $this->validate(request(), [ 
        'atleta' => 'required',
        'categoria' => 'required' 
    ]);
     $atlcategoria = new AtlCategoria([
        'atleta' => $request->get('atleta'), 
        'categoria' => $request->get('categoria'), 
               //campos de exigencia de valores
    ]);
     AtlCategoria::create($request->all());
     return back()->with('success', 'Cinturão atribuído ao atleta com sucesso'); 
 }


 public function destroy($id)
 {
     $atlcategoria = AtlCategoria::find($id);
     $atlcategoria->delete();

     return redirect('/atlcinto');
 }  
}
