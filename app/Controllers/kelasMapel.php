<?php

namespace App\Controllers;

use App\Models\KelasMapelModel;

class kelasMapel extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasMapelModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_mapel');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,id_kelas,nama_mapel,kelas_mapel.nip as kelas_mapelnip,nama_guru,id_kelas_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');
        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'kelasmapel' => $query->getResult(),
            'kelasMapelInsert' => $this->dataModel->getData(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelasMapel', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas Mapel',
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelasMapelCreate', $data);
    }

    public function save()
    {
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,id_kelas,nama_mapel,kelas_mapel.nip as kelas_mapelnip,nama_guru,id_kelas_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');
        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $query = $this->builder->get();
        $this->dataModel->save([
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'nip' => $this->request->getVar('nip')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'tambah' => $tambah,
            'kelasmapel' => $query->getResult(),
            'kelasMapelInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelasMapel', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,id_kelas,nama_mapel,kelas_mapel.nip as kelas_mapelnip,nama_guru,id_kelas_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');
        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $query = $this->builder->get();
        $this->builder->delete(['id_kelas_mapel' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'delete' => $delete,
            'kelasmapel' => $query->getResult(),
            'kelasMapelInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelasMapel', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas Mapel',
            'kelasmapel' => $this->dataModel->getData($id),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelasMapelEdit', $data);
    }

    public function update($id)
    {
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,id_kelas,nama_mapel,kelas_mapel.nip as kelas_mapelnip,nama_guru,id_kelas_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');
        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $query = $this->builder->get();
        $data = [
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'nip' => $this->request->getVar('nip')
        ];
        $this->builder->where('id_kelas_mapel', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'edit' => $edit,
            'kelasmapel' => $query->getResult(),
            'kelasMapelInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelasMapel', $data);
    }
}
