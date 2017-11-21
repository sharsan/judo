<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\AtlEscalao;  

class AtlEscalaoController extends Controller
{
  public function index()
  {
   $atlescalao = AtlEscalao::all()->toArray();

   return view('atlescalao.index', compact('atlescalao'));
 } 
 
 public function create()
 {
   $atlescalao = new AtlEscalao();
   return view("atlescalao.create",compact('atlescalao')); 
 } 
 
 public function edit($id)
 {
   $atlescalao = AtlEscalao::find($id);

   return view('atlescalao.edit', compact('atlescalao','id')); 
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
