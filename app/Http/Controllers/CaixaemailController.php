<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Caixaemail;

class CaixaemailController extends Controller
{
  public function index()
  {

   $caixaemail = Caixaemail::all()->toArray();        
   return view('caixaemail.index', compact('caixaemail'));
 }

 public function create()

 {

  $caixaemail = Caixaemail::all();  
    // $caixaemail =Caixaemail::all()->toArray();   
  return view("caixaemail.create",compact('caixaemail'));   
}

public function store(Request $request)
{

  $this->validate(request(), [
         // 'sender_name' => 'required|unique:clubes|max:40',
    'subject' => 'required', 
  ]);
  Caixaemail::create($request->all());
 // return back()->with('success', 'Email enviado com sucesso'); 
  // return view('mail', compact('caixaemail'));
  return redirect('mail');  
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
 $caixaemail = Caixaemail::find($id);
 $caixaemail->delete();

 return redirect('mail');
}  
}
