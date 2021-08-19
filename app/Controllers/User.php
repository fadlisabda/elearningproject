<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
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
            'title' => 'FSELEARNING - User',
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data User'
        ];

        return view('datamaster/userCreate', $data);
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
            'title' => 'FSELEARNING - User',
            'tambah' => $tambah,
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data User',
            'user' => $this->dataModel->getData($id)
        ];

        return view('datamaster/userEdit', $data);
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
            'title' => 'FSELEARNING - User',
            'edit' => $edit,
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_user' => $id]);
        $delete = true;
        $data = [
            'title' => 'FSELEARNING - User',
            'delete' => $delete,
            'user' => $this->dataModel->getData()
        ];
        return view('datamaster/user', $data);
    }
}
