<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{ 
    public function index()
    {

        return view('layouts.template', compact('email'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function build()
    {
        return $this->from('isaacbadru@gmail.com')
        ->view('emails.orders.shipped');
    }
}
