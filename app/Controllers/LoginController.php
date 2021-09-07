<?php

namespace App\Controllers;

use App\Models\LoginModel;


class LoginController extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    public function index()
    {
        return view('login/loginview');
    }

    public function save()
    {
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $result = $this->loginModel->getData($username);
            // cek username
            if (empty($result["username"])) {
                $error = true;
                $data = [
                    'error' => $error
                ];
                return view('login/loginview', $data);
            }
            if ($username === $result["username"]) {
                // cek password
                if (password_verify($password, $result["password"])) {
                    // set session
                    $_SESSION["login"] = true;
                    $_SESSION["status"] = $result["status"];
                    $_SESSION["username"] = $result["username"];
                    $data = [
                        'title' => 'ELEARNING'
                    ];
                    return view('home/homeview', $data);
                } else {
                    $error = true;
                    $data = [
                        'error' => $error
                    ];
                    return view('login/loginview', $data);
                }
            }
        }
    }
}
