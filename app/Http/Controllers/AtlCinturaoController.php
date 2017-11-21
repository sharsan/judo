<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\AtlCinturao; 

use App\Atleta;
use App\Cinturao; 


class AtlCinturaoController extends Controller
{
  public function index()
  {
   $atlcinturao = AtlCinturao::all()->toArray();

   $atleta_id = Atleta::all();  
   $cinturao_id = Cinturao::all();  

   return view('atlcinturao.index', compact('atlcinturao','atleta_id','cinturao_id'));
 } 

 public function create()
 {
   $atlcinturao = AtlCinturao::all();  

   $atleta_id = Atleta::all();   
   $cinturao_id = Cinturao::all();  

   return view("atlcinturao.create", compact('atlcinturao','atleta_id','cinturao_id'));   
 }   

 public function edit($id)
 {
   $atlcinturao = AtlCinturao::find($id);

   $atleta_id = Atleta::all();  
   $cinturao_id = Cinturao::all();  

   return view('atlcinturao.edit', compact('atlcinturao','id','atleta_id','cinturao_id')); 
 } 

 public function update(Request $request, $id)
 {          
   request()->validate(  
    [   
      'atleta_id' => 'required',
      'cinturao_id' => 'required' 
    ]); 
   AtlCinturao::find($id)->update($request->all());
   return redirect()->route('atlcinturao.index')

   ->with('success','Atribuição de cinto actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
   $this->validate(request(), [ 
    'atleta_id' => 'required',
    'cinturao_id' => 'required' 
  ]);
   $atlcinturao = new AtlCinturao([
    'atleta_id' => $request->get('atleta_id'), 
    'cinturao_id' => $request->get('cinturao_id'), 
               //campos de exigencia de valores
  ]);
   AtlCinturao::create($request->all());
   return back()->with('success', 'Cinturão atribuído ao atleta com sucesso'); 
 } 

 public function destroy($id)
 {
   $atlcinturao = AtlCinturao::find($id);
   $atlcinturao->delete();

   return redirect('/atlcinto');
 }  
}
