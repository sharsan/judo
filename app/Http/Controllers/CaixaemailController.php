<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Caixaemail;

use App\Estado; 
use App\Clube;   

class CaixaemailController extends Controller
{
    public function index()
    {

     $caixaemail = Caixaemail::all()->toArray();        
     return view('caixaemail.index', compact('caixaemail'));
 }

 public function create()
 {

    $caixaemail =Caixaemail::all()->toArray();   
    return view("caixaemail.create",compact('caixaemail'));  
}

public function store(Request $request)
{

 $this->validate(request(), [
         // 'sender_name' => 'required|unique:clubes|max:40',
    'email' => 'required|unique:users, email',
]);
 $caixaemail = new Caixaemail([
    'user_name' => $request->get('user_name'),  
    'recipient_name' => $request->get('recipient_name'),  
    'recipient_email' => $request->get('recipient_email'),  
    'subject' => $request->get('subject'),  
    'content' => $request->get('content')
               //campos de exigencia de valores 


]);
 Caixaemail::create($request->all());
 return back()->with('success', 'Email enviado com sucesso'); 
}

public function show($id)
{
        //
}

public function edit($id)
{
        //
}

public function update(Request $request, $id)
{
        //
}

public function destroy($id)
{
        //
}
}
