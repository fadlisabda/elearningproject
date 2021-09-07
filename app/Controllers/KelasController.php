<?php

namespace App\Controllers;

use App\Models\KelasModel;

class kelascontroller extends BaseController
{
    protected $db, $dataModel, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas');
    }

    public function index()
    {
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas',
            'kelas' => $query->getResult(),
            'kelasInsert' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas'
        ];

        return view('datamaster/kelas/kelasCreate', $data);
    }

    public function save()
    {
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
        $this->dataModel->save([
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip' => $this->request->getVar('nip')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'tambah' => $tambah,
            'kelas' => $query->getResult(),
            'kelasInsert' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas',
            'kelas' => $this->dataModel->getData($id)
        ];

        return view('datamaster/kelas/kelasEdit', $data);
    }

    public function update($id)
    {
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
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
            'kelas' => $query->getResult(),
            'kelasInsert' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }

    public function delete($id)
    {
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
            exit;
        }
        $this->builder->delete(['id_kelas' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'delete' => $delete,
            'kelas' => $query->getResult(),
            'kelasInsert' => $this->dataModel->getData()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }
}
