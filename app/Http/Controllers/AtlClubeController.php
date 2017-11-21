<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\AtlClube; 

use App\Atleta;  
use App\Clube;  

class AtlClubeController extends Controller
{
  public function index()
  {
   $atlclube = AtlClube::all()->toArray();

   $atleta = Atleta::all(); 
   $clube = Clube::all(); 

   return view('atlclube.index', compact('atlclube','atleta','clube'));
 } 

 public function create()
 {
   $atlclube = AtlClube::all(); 

   $atleta = Atleta::all();  
   $clube = Clube::all(); 
   return view("atlclube.create", compact('atlclube','atleta','clube'));   
 }  
 
 public function edit($id)
 {
   $atlclube = AtlClube::find($id);

   $atleta = Atleta::all(); 
   $clube = Clube::all(); 

   return view('atlclube.edit', compact('atlclube','id','atleta','clube')); 
 } 

 public function update(Request $request, $id)
 {          
   request()->validate(  
    [   
      'atleta' => 'required',
      'clube' => 'required' 
    ]); 
   AtlClube::find($id)->update($request->all());
   return redirect()->route('atlclube.index')

   ->with('success','Escalao actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
   $this->validate(request(), [ 
    'atleta' => 'required',
    'clube' => 'required' ,
    'data' => 'required' 
  ]);
   $atlclube = new AtlClube([
    'atleta' => $request->get('atleta'), 
    'clube' => $request->get('clube'),  
    'data' => $request->get('data') 
               //campos de exigencia de valores
  ]);
   AtlClube::create($request->all());
   return back()->with('success', 'Atleta adicionado ao clube com sucesso'); 
 }


 public function destroy($id)
 {
   $atlclube = AtlClube::find($id);
   $atlclube->delete();

   return redirect('/atlclube');
 }  
}
