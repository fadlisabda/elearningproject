<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        return view('login/index');
    }
}
