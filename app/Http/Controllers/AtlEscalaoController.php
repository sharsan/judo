<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\AtlEscalao;  

use App\Atleta;
use App\Escalao; 


class AtlEscalaoController extends Controller
{
  public function index()
  {
   $atlescalao = AtlEscalao::all()->toArray(); 

   $atleta = Atleta::all();  
   $escalao = Escalao::all();  
   return view('atlescalao.index', compact('atlescalao','atleta','escalao'));
 } 
 
 public function create()
 {
   $atlescalao = new AtlEscalao();
   
   $atleta = Atleta::all();  
   $escalao = Escalao::all();  
   return view("atlescalao.create",compact('atlescalao','atleta','escalao')); 
 } 
 
 public function edit($id)
 {
   $atlescalao = AtlEscalao::find($id);

   $atleta = Atleta::all();  
   $escalao = Escalao::all();  
   return view('atlescalao.edit', compact('atlescalao','id','atleta','escalao')); 
 } 

 public function update(Request $request, $id)
 {          
   request()->validate(  
    [   
      'nome' => 'required' 
    ]); 
   AtlEscalao::find($id)->update($request->all());
   return redirect()->route('atlescalao.index')

   ->with('success','Escalao actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
   $this->validate(request(), [
     'nome' => 'required|unique:atlescalaos|max:20',
   ]);
   $atlescalao = new AtlEscalao([
    'nome' => $request->get('nome'), 
               //campos de exigencia de valores
  ]);
   AtlEscalao::create($request->all());
   return back()->with('success', 'Escalao adicionado com sucesso'); 

 } 
 
 public function destroy($id)
 {
   $atlescalao = AtlEscalao::find($id);
   $atlescalao->delete();

   return redirect('/atlescalao');
 }  
}
