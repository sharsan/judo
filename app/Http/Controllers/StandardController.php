<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandardController extends Controller
{ 
    public function index()
    {
        return view("standard",compact('standard')); 

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
}
