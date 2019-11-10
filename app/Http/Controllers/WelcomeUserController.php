<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function __invoke($name, $nickname = null){

        $name = ucfirst($name);

        if($nickname){
            return "Welcome {$name}, your nickname is {$nickname}";
        }
        else{
            return "Welcome {$name}";
        }
    }
}
