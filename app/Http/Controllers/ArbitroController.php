<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Arbitro;  


class ArbitroController extends Controller
{
  public function index()
  {
    $arbitro =Arbitro::all()->toArray();      
    return view("arbitro.index",compact('arbitro'));
  }
  public function create()
  {                                               
   return view("arbitro.create",compact('arbitro')); 
 }

 public function edit($id)
 {        
   $arbitro = Arbitro::find($id);
   return view('arbitro.edit',compact('arbitro','id'));
 }   

 public function store(Request $request)
 {     
 // //   $existe=$request->get('telefone')!="";

 // //   if($existe==true){
 // //     $this->validate(request(), [

 // //      'telefone'=> 'numeric|between:820000000,829999999', 

 // //    ]);  

 // //   }  

  $existe=$request->get('apelido')!="";

  if($existe==true){
   $this->validate(request(), [
    'apelido' => 'min:3,max:40',    

  ]);  

 }
 $existe=$request->get('ano')!="";

 if($existe==true){
   $this->validate(request(), [
    'ano'=> 'numeric|min:1960|max:2003',  

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
     'nome' => 'required|unique:arbitros|min:3,max:40',   
   ]);
 }

 Arbitro::create($request->all());
 return back()->with('success', 'Arbitro adicionado com sucesso'); 

}         

public function update(Request $request, $id)
{ 

  $existe=$request->get('apelido')!="";

  if($existe==true){
   $this->validate(request(), [
    'apelido' => 'min:3,max:40',    
  ]);  

 }
 $existe=$request->get('ano')!="";

 if($existe==true){
   $this->validate(request(), [
    'ano'=> 'numeric|min:1960|max:2003',   
  ]);   
 }

 $existe=$request->get('email')!="";

 if($existe==true){
   $this->validate(request(), [
    'email' => 'required|email', 

  ]);  

 }
 else{  

   request()->validate(  
    [   
      'nome' => 'required|min:3,max:40',    
     // 'email' => 'required|email|arbitros:users,email', 
    ]); 
 }
 Arbitro::find($id)->update($request->all());
 return redirect()->route('arbitro.index')

 ->with('success','Arbitro actualizado com sucesso'); 
} 

public function destroy(Request $request, $id)

{

 Arbitro::find($id)->delete();
        // return back()->with('success', 'Arbitro apagado com sucesso');
 return redirect()->route('arbitro.index')

 ->with('success','Arbitro apagado com successo');

}  
 // public function testPhotoCanBeUploaded()
 // {
 //   $this->visit('/upload')
 //   ->attach($pathToFile, 'photo')
 //   ->press('Upload')
 //   ->see('Upload Successful!');
 // }  
}