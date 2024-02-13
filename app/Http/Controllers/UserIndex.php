<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserIndex extends Controller
{
    //

    public function indexUser(){
        return view('User.index');
    }
}
