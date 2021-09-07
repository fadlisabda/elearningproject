<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $dataModel, $builder;
    public function __construct()
    {
        $this->dataModel = new UserModel();
        $db      = \Config\Database::connect();
        $this->builder = $db->table('user');
    }

    public function index()
    {
        $data = [
            'title' => 'ELEARNING - User',
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user/userview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data User'
        ];

        return view('datamaster/user/userCreate', $data);
    }

    public function save()
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->dataModel->save([
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password_hash' => $passwordHash,
            'level_user' => $this->request->getVar('level_user'),
            'status_user' => $this->request->getVar('flexRadioDefault')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - User',
            'tambah' => $tambah,
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user/userview', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data User',
            'user' => $this->dataModel->getData($id)
        ];

        return view('datamaster/user/userEdit', $data);
    }

    public function update($id)
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password_hash' => $passwordHash,
            'level_user' => $this->request->getVar('level_user'),
            'status_user' => $this->request->getVar('flexRadioDefault')
        ];

        $this->builder->where('id_user', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - User',
            'edit' => $edit,
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user/userview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
            exit;
        }
        $this->builder->delete(['id_user' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - User',
            'delete' => $delete,
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user/userview', $data);
    }
}
