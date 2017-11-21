<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesoController extends Controller
{

 $peso = Peso::all()->toArray();

 return view('atlpeso.index', compact('peso'));
}

public function create()
{
 $peso = Peso::all();
 return view("atlpeso.create",compact('peso')); 
} 

public function edit($id)
{
 $peso = Peso::find($id);

 return view('atlpeso.edit', compact('peso','id')); 
} 

public function store(Request $request)
{     
   $this->validate(request(), [ 
       'peso'=> 'is_double()|min:10|max:120', 
   ]);
   $peso = new Peso([
    'peso' => $request->get('peso'),  
    // 'descricao' => $request->get('descricao')
               //campos de exigencia de valores
]);
   Peso::create($request->all());
   return back()->with('success', 'Registro do ppeso adicionado com sucesso'); 

}

public function update(Request $request, $id)
{     
   request()->validate(  
      [   
          'atleta' => 'required',
          'peso'=> 'is_double()|min:10|max:120', 
          'data' => 'required'
      ]); 
   Peso::find($id)->update($request->all());
   return redirect()->route('peso.index')

   ->with('success','Peso actualizado com sucesso');  
}

public function destroy($id)
{
   $peso = Peso::find($id);
   $peso->delete();

   return redirect('/peso');
}  
}
