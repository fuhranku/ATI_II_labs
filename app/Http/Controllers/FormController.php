<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function update()
    {

    }

    public function read()
    {
    
    }

    public function delete()
    {

    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'Nombre' => 'required|alpha|max:255',
            'Apellido' => 'required|max:255',
            'Email' => 'required|email|max:255',
            'Cedula' => 'required|numeric|digits:8',
            'Genero' => 'required',
        ]);
        if ($validatedData->fails()){
            $submitState = 0;
            return view('modal',compact('submitState'))->withErrors($validatedData);
        }
        
        \App\Form::create($request->all());
        $submitState = 1;
        return view('modal',compact('submitState'));
    }
}
