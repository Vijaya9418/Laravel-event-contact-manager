<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logout extends Controller
{
    //
    public function logout()
    {
        setcookie("name", "", -1, '/');
        setcookie("username", "", -3600, '/');
        return redirect('login');
    }
}
