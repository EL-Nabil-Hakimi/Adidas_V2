<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSessionController extends Controller
{
    //

    public static function checkSession() {
        $role_id = Session::get('role_id');
        $user_id = Session::get('user_id');
    
        if ($role_id && $user_id) {
            return ['role_id' => $role_id, 'user_id' => $user_id];
        } else {
            return redirect()->to('/login');
        }
    }
}
