<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Cinturao;

use App\Atleta;

class CinturaoController extends Controller

{  public function index()
  {
   $cinturao = Cinturao::all()->toArray();

   return view('cinturao.index', compact('cinturao'));
 }

 public function create()
 {
   $cinturao = Cinturao()->toArray();

   $atleta = Atleta::all();
   return view("cinturao.create",compact('cinturao','atleta'));  
 } 

 public function edit($id)
 {
   $cinturao = Cinturao::find($id);

   $atleta = Atleta::all();

   return view('cinturao.edit', compact('cinturao','id','atleta')); 
 } 

 public function store(Request $request)
 {     
   $this->validate(request(), [ 
    'atleta' => 'required|min:3,max:40',  
    'cinturao' => 'required|unique:cinturao|max:20',
    'data' => 'required' 
  ]);
   $cinturao = new Cinturao([
    'atleta' => $request->get('atleta'),  
    'cinturao' => $request->get('cinturao'), 
    'data' => $request->get('data'),   
    'descricao' => $request->get('descricao')
               //campos de exigencia de valores
  ]);
   Cinturao::create($request->all());
   return back()->with('success', 'Cinturao adicionado com sucesso'); 

 }

 public function update(Request $request, $id)
 {     
   request()->validate(  
    [   
      'atleta' => 'required',
      'cinturao' => 'required' , 
      'data' => 'required' 
    ]); 
   Cinturao::find($id)->update($request->all());
   return redirect()->route('cinturao.index')

   ->with('success','Categoria actualizada com sucesso');  
 }

 public function destroy($id)
 {
   $cinturao = Cinturao::find($id);
   $cinturao->delete();

   return redirect('/atlcinto');
 }  
}
