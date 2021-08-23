<?php

namespace App\Controllers;

use App\Models\RegisterModel;

class Register extends BaseController
{
    protected $registerModel;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('el_user');
        $this->registerModel = new RegisterModel();
    }
    public function index()
    {
        return view('register/index');
    }
    public function save()
    {
        if (isset($_POST["register"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $status = $_POST["status"];
            $result = $this->registerModel->getData($username);
            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                $error = true;
                $data = [
                    'error' => $error
                ];
                return view('register/index', $data);
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
                $error = true;
                $data = [
                    'error' => $error
                ];
                return view('register/index', $data);
            }
            // cek username sudah ada atau belum
            if (isset($result["username"]) && $username === $result["username"]) {
                echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
                return view('register/index');
            }
            // cek konfirmasi password
            if ($password !== $password2) {
                echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
                return view('register/index');
            }

            // enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => $username,
                'password'  => $password,
                'status'  => $status
            ];

            $this->builder->insert($data);
            $sukses = true;
            $data = [
                'sukses' => $sukses
            ];
            return view('login/index', $data);
        }
    }
}
