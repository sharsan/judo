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

    $caixaemail =Caixaemail::all();  
    // $caixaemail =Caixaemail::all()->toArray();   
    return view("caixaemail.create",compact('caixaemail'));   
}

public function store(Request $request)
{

   $this->validate(request(), [
         // 'sender_name' => 'required|unique:clubes|max:40',
    'subject' => 'required|unique:caixaemails',
]);
   $caixaemail = new Caixaemail([
    'user_name' => $request->get('user_name'), 
    'sender_email' => $request->get('sender_email'),  
    'recipient_name' => $request->get('recipient_name'),  
    'recipient_email' => $request->get('recipient_email'),  
    'subject' => $request->get('subject'),  
    'content' => $request->get('content')
               //campos de exigencia de valores 


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
