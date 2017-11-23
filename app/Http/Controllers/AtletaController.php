<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;  
use App\Atleta;  
use App\AtletaPeso; 
use App\Cinturao; 

// use App\AtlPeso; 

class AtletaController extends Controller
{   

  public function index()
  {
    $atleta = Atleta::all()->toArray(); 

    return view('atleta.index', compact('atleta'));
  } 

  public function create()
  {              
   $atleta = Atleta::all();   

   return view("atleta.create", compact('atleta'));
 }   

 public function edit($id)
 { 
   $atleta= Atleta::find($id); 

   return view('atleta.edit', compact('atleta','id'));
 } 

 public function update(Request $request, $id)
 { 
   request()->validate(  
    [   
      'nome' => 'required|unique:atletas|min:3,max:40',   
     // 'email' => 'required|email|atletas:users,email',  
    ]); 
   Atleta::find($id)->update($request->all());
   return redirect()->route('atleta.index')

   ->with('success','Atleta actualizado com sucesso'); 
 }

 public function store(Request $request)
 {       
   $existe=$request->get('ano')!="";

   if($existe==true){
     $this->validate(request(), [
      'ano'=> 'numeric|min:1960|max:2014',  

    ]);  

   }

   $existe=$request->get('email')!="";

   if($existe==true){
     $this->validate(request(), [
      'email' => 'required|email', 

    ]);  

   }
   else{  

     $this->validate(request(), [
       'nome' => 'required|unique:atletas|min:3,max:40',   
     ]);
   } 
   Atleta::create($request->all());
   return back()->with('success', 'Atleta adicionado com sucesso');
   
        // return redirect('/atleta');
 }   
 
 public function show($id) 
 { 


// $this->db->select('*');
// $this->db->from('articles');
// $this->db->join('category', 'category.id = articles.id');
// $this->db->join('comments', 'comments.id = articles.id');

// $query = $this->db->get();



  // $atletapeso = AtletaPeso::all();
  // $atletapeso_id = AtletaPeso::all();
  // $cinturao_id = Cinturao::all();  
  // $atleta = Atleta::all()->join(Cinturao::all())->join(AtletaPeso::all())

  // ->select('atleta.nome', 'cinturao.*', 'pesos.*')->get();




  // $processos = Processo::join('autores', 'autores.processo_id', 'processos.id')
  // ->join('reus', 'reus.processo_id', 'processos.id')
  // ->join('pessoas', 'autores.pessoa_id', 'pessoas.id')
  // ->join('pessoas', 'reus.pessoa_id', 'pessoas.id')
  // ->select('pessoas.nome as nome_pessoa', 'processos.*', 'autores.*', 'reus.*')->get()

  // $atleta = Atleta::find($id); 

  // return view('atleta.show', ['atleta' =>$atleta]); 
 } 


 public function destroy($id)
 {
  $atleta = Atleta::find($id);
  $atleta->delete();

  return redirect('atleta');
} 

} 