<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Requesting;


class FormController extends Controller
{
    public function create()
    {
        $currentPage = 'create';
        return view('create', compact('currentPage'));
    }

    public function update(Request $request)
    {
        $flag = 0;
        $users = \App\Form::all();
        $userC = null;
        $currentPage = 'update';
        // GET
        if(Requesting::isMethod('get')){
            return view('update',compact('users','currentPage','flag','userC'));
        }

        // POST
        if(Requesting::isMethod('post')){
            $userC = \App\Form::find($request->input("id"));
            $validatedData = Validator::make($request->all(), [
                'Nombre' => 'required|alpha|max:255',
                'Apellido' => 'required|max:255',
                'Email' => 'required|email|max:255',
                'Cedula' => 'required|numeric|digits:8',
                'Genero' => 'required',
            ]);
            if ($validatedData->fails()){
                $flag = 1;
                return view('update',compact('flag', 'users','currentPage','userC'))->withErrors($validatedData);
            }

            $userC->Nombre = $request->input("Nombre");
            $userC->Apellido = $request->input("Apellido");
            $userC->Email = $request->input("Email");
            $userC->Cedula = $request->input("Cedula");
            $userC->Genero = $request->input("Genero");
            $userC->save();
            return back();
        }

    }

    public function read()
    {
        $currentPage = 'read';
        $users = \App\Form::all();
        return view('read',compact('users','currentPage'));
    }

    public function delete($id)
    {        
        \App\Form::find($id)->delete($id);
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
