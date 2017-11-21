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

   $atleta = Atleta::all();  
   $cinturao = Cinturao::all();  

   return view('atlcinturao.index', compact('atlcinturao','atleta','cinturao'));
 } 

 public function create()
 {
   $atlcinturao = AtlCinturao::all();  

   $atleta = Atleta::all();   
   $cinturao = Cinturao::all();  

   return view("atlcinturao.create", compact('atlcinturao','atleta','cinturao'));   
 }   

 public function edit($id)
 {
   $atlcinturao = AtlCinturao::find($id);

   $atleta = Atleta::all();  
   $cinturao = Cinturao::all();  

   return view('atlcinturao.edit', compact('atlcinturao','id','atleta','cinturao')); 
 } 

 public function update(Request $request, $id)
 {          
   request()->validate(  
    [   
      'atleta' => 'required',
      'cinturao' => 'required' 
    ]); 
   AtlCinturao::find($id)->update($request->all());
   return redirect()->route('atlcinturao.index')

   ->with('success','Atribuição de cinto actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
   $this->validate(request(), [ 
    'atleta' => 'required',
    'cinturao' => 'required' 
  ]);
   $atlcinturao = new AtlCinturao([
    'atleta' => $request->get('atleta'), 
    'cinturao' => $request->get('cinturao'), 
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
