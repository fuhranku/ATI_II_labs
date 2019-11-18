<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FormController extends Controller
{
    public function create()
    {
        $currentPage = 'create';
        return view('create', compact('currentPage'));
    }

    public function update()
    {
        $currentPage = 'update';
        $users = \App\Form::all();
        return view('update',compact('users','currentPage'));
    }

    public function read()
    {
        $currentPage = 'read';
        $users = \App\Form::all();
        return view('read',compact('users','currentPage'));
    }

    public function delete($id)
    {        
        //$deletedRows = App\Form::where('id', $id)->delete();

        \App\Form::find($id)->delete($id);
        return json("arre loco");
    }

    public function getdelete()
    {
        $currentPage = 'delete';
        $users = \App\Form::all();
        return view('delete',compact('users','currentPage'));
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
        $currentPage = 'create';
        if ($validatedData->fails()){
            $submitState = 0;
            return view('modal',compact('submitState','currentPage'))->withErrors($validatedData);
        }
        
        \App\Form::create($request->all());
        $submitState = 1;
        
        return view('modal',compact('submitState','currentPage'));
    }
}
