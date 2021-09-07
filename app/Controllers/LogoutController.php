<?php

namespace App\Controllers;

class LogoutController extends BaseController
{
    public function index()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        return view('login/loginview');
    }
}
