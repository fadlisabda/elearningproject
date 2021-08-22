<?php

namespace App\Controllers;

use App\Models\GuruModel;

class guru extends BaseController
{
    protected $dataModel, $builder;
    public function __construct()
    {
        $this->dataModel = new GuruModel();
        $db      = \Config\Database::connect();
        $this->builder = $db->table('data_guru');
    }
    public function index()
    {
        $data = [
            'title' => 'ELEARNING - Guru',
            'guru' => $this->dataModel->getData()
        ];
        return view('datamaster/guru', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Guru'
        ];

        return view('datamaster/guruCreate', $data);
    }

    public function save()
    {
        $this->dataModel->save([
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Guru',
            'tambah' => $tambah,
            'guru' => $this->dataModel->getData()
        ];
        return view('datamaster/guru', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_guru' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Guru',
            'delete' => $delete,
            'guru' => $this->dataModel->getData()
        ];
        return view('datamaster/guru', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Guru',
            'guru' => $this->dataModel->getData($id)
        ];

        return view('datamaster/guruEdit', $data);
    }

    public function update($id)
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat')
        ];

        $this->builder->where('id_guru', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Guru',
            'edit' => $edit,
            'guru' => $this->dataModel->getData()
        ];
        return view('datamaster/guru', $data);
    }
}
