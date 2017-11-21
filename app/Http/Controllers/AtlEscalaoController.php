<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Attescalao;  

class AttEscalaoController extends Controller
{
  public function index()
  {
     $attescalao = Attescalao::all()->toArray();
     
     return view('attescalao.index', compact('attescalao'));
 }
 
 public function create()
 {
     $attescalao = new Attescalao();
     return view("attescalao.create",compact('attescalao')); 
 } 
 
 public function edit($id)
 {
     $attescalao = Attescalao::find($id);
     
     return view('attescalao.edit', compact('attescalao','id')); 
 } 

 public function update(Request $request, $id)
 {          
     request()->validate(  
        [   
          'nome' => 'required' 
      ]); 
     Attescalao::find($id)->update($request->all());
     return redirect()->route('attescalao.index')

     ->with('success','Escalao actualizado com sucesso');   
 }
 public function store(Request $request)
 {     
     $this->validate(request(), [
       'nome' => 'required|unique:attescalaos|max:20',
   ]);
     $attescalao = new Attescalao([
        'nome' => $request->get('nome'), 
               //campos de exigencia de valores
    ]);
     Attescalao::create($request->all());
     return back()->with('success', 'Escalao adicionado com sucesso'); 
     
 }
 
 
 public function destroy($id)
 {
     $attescalao = Attescalao::find($id);
     $attescalao->delete();

     return redirect('/attescalao');
 }  
}
