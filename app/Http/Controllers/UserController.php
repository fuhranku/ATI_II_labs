<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class UserController extends Controller
{
    public function index(){
        return 'Users';
    }

    public function show($id){
        return "Displaying details of user: {$id}";
    }

    public function create(){
        return "Create new user";
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
