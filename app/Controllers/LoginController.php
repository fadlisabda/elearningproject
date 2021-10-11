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
        $data = [
            'title' => 'ELEARNING - Login'
        ];
        return view('login/loginview', $data);
    }

    public function home()
    {
        $data = [
            'title' => 'ELEARNING - Home'
        ];
        return view('home/homeview', $data);
    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        return redirect()->to(base_url() . '/login');
    }

    public function save()
    {
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $result = $this->loginModel->getData($username);
            // cek username
            if (empty($result["username"])) {
                session()->setFlashData('error', 'username / password salah');
                return redirect()->to(base_url() . '/login');
            }
            if ($username === $result["username"]) {
                // cek password
                if (password_verify($password, $result["password"])) {
                    // set session
                    $_SESSION["login"] = true;
                    $_SESSION["status"] = $result["status"];
                    $_SESSION["username"] = $result["username"];
                    return redirect()->to(base_url() . '/home');
                } else {
                    session()->setFlashData('error', 'username / password salah');
                    return redirect()->to(base_url() . '/login');
                }
            }
        }
    }
}
