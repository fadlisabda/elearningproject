<?php

namespace App\Controllers;

use App\Models\EluserModel;

class Eluser extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('el_user');
        $this->dataModel = new EluserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'ELEARNING - ElUser',
            'eluser' => $this->dataModel->getData()
        ];
        return view('eluser/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data ELUser'
        ];

        return view('eluser/eluserCreate', $data);
    }

    public function save()
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->dataModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $passwordHash,
            'status' => $this->request->getVar('status')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - ElUser',
            'tambah' => $tambah,
            'eluser' => $this->dataModel->getData()
        ];
        return view('eluser/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data ElUser',
            'eluser' => $this->dataModel->getData($id)
        ];

        return view('eluser/eluserEdit', $data);
    }

    public function update($id)
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $passwordHash,
            'status' => $this->request->getVar('status')
        ];

        $this->builder->where('id', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - ElUser',
            'edit' => $edit,
            'eluser' => $this->dataModel->getData()
        ];
        return view('eluser/index', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - ElUser',
            'delete' => $delete,
            'eluser' => $this->dataModel->getData()
        ];
        return view('eluser/index', $data);
    }
}
