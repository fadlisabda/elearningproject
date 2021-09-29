<?php

namespace App\Controllers;

class KelasController extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
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
            'kelas' => $query->getResult()
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
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip'  => $this->request->getVar('nip')
        ];
        $this->builder->insert($data);
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'tambah' => $tambah,
            'kelas' => $query->getResult()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }

    public function edit($id)
    {
        $this->builder->where('id_kelas', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'Ubah Data Kelas',
            'kelas' => $query->getResult()
        ];

        return view('datamaster/kelas/kelasEdit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip' => $this->request->getVar('nip')
        ];

        $this->builder->where('id_kelas', $id);
        $this->builder->update($data);
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'edit' => $edit,
            'kelas' => $query->getResult()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_kelas' => $id]);
        $this->builder->select('kelas.nip as kelasnip,id_kelas,nama_kelas,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip = kelas.nip');
        $query = $this->builder->get();
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Kelas',
            'delete' => $delete,
            'kelas' => $query->getResult()
        ];
        return view('datamaster/kelas/kelasview', $data);
    }
}
