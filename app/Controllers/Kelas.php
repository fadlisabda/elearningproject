<?php

namespace App\Controllers;

use App\Models\KelasModel;

class kelas extends BaseController
{
    protected $dataModel, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasModel();
        $db      = \Config\Database::connect();
        $this->builder = $db->table('kelas');
    }
    public function index()
    {
        $data = [
            'title' => 'ELEARNING - Kelas',
            'kelas' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas'
        ];

        return view('datamaster/kelasCreate', $data);
    }

    public function save()
    {
        $this->dataModel->save([
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip' => $this->request->getVar('nip')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'tambah' => $tambah,
            'kelas' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas',
            'kelas' => $this->dataModel->getData($id)
        ];

        return view('datamaster/kelasEdit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip' => $this->request->getVar('nip')
        ];

        $this->builder->where('id_kelas', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'edit' => $edit,
            'kelas' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_kelas' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'delete' => $delete,
            'kelas' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas', $data);
    }
}
