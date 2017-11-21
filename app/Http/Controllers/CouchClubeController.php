<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\CouchClube; 

use App\Clube; 
use App\Treinador;   

class CouchClubeController extends Controller
{
  public function index()
  {
   $couchclube = CouchClube::all()->toArray();

   $treinador = new Treinador();
   $clube = new Clube();

   return view('couchclube.index', compact('couchclube','treinador','clube'));
 }

 public function create()
 {
   $couchclube = new CouchClube();

   $treinador = new Treinador();
   $clube = new Clube();
   return view("couchclube.create",compact('couchclube','treinador','clube')); 
 } 

 public function edit($id)
 {
   $couchclube = CouchClube::find($id);

   $treinador = new Treinador();
   $clube = new Clube();

   return view('couchclube.edit', compact('couchclube','id','treinador','clube')); 
 } 

 public function update(Request $request, $id)
 {          
   request()->validate(  
    [   
      'treinador' => 'required',
      'clube' => 'required' 
    ]); 
   CouchClube::find($id)->update($request->all());
   return redirect()->route('couchclube.index')

   ->with('success','Escalao actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
   $this->validate(request(), [ 
    'treinador' => 'required',
    'clube' => 'required' 
  ]);
   $couchclube = new CouchClube([
    'treinador' => $request->get('treinador'), 
    'clube' => $request->get('clube'), 
               //campos de exigencia de valores
  ]);
   CouchClube::create($request->all());
   return back()->with('success', 'Treinador adicionado ao clube com sucesso adicionado com sucesso'); 
 }


 public function destroy($id)
 {
   $couchclube = CouchClube::find($id);
   $couchclube->delete();

   return redirect('/couchclube');
 }  
}
