<?php

namespace App\Controllers;

use App\Models\KelasJamPelajaranModel;

class kelasJamPelajarancontroller extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasJamPelajaranModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_jam_pelajaran');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_jam_pelajaran.id_mapel as kelas_jam_pelajaranid_mapel,id_kelas,hari,jam,nama_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_jam_pelajaran.id_mapel');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Jam Pelajaran',
            'kelasjampelajaran' => $query->getResult(),
            'kelasJamPelajaranInsert' => $this->dataModel->getData(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelas/JamPelajaranview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Jam Pelajaran',
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelas/JamPelajaranCreate', $data);
    }

    public function save()
    {
        $this->builder->select('kelas_jam_pelajaran.id_mapel as kelas_jam_pelajaranid_mapel,id_kelas,hari,jam,nama_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_jam_pelajaran.id_mapel');
        $query = $this->builder->get();
        $this->dataModel->save([
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Kelas Jam Pelajaran',
            'tambah' => $tambah,
            'kelasjampelajaran' => $query->getResult(),
            'kelasJamPelajaranInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelas/JamPelajaranview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
            exit;
        }
        $this->builder->select('kelas_jam_pelajaran.id_mapel as kelas_jam_pelajaranid_mapel,id_kelas,hari,jam,nama_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_jam_pelajaran.id_mapel');
        $query = $this->builder->get();
        $this->builder->delete(['id_jadwal' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Kelas Jam Pelajaran',
            'delete' => $delete,
            'kelasjampelajaran' => $query->getResult(),
            'kelasJamPelajaranInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelas/JamPelajaranview', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas Jam Pelajaran',
            'kelasjampelajaran' => $this->dataModel->getData($id),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelas/JamPelajaranEdit', $data);
    }

    public function update($id)
    {
        $this->builder->select('kelas_jam_pelajaran.id_mapel as kelas_jam_pelajaranid_mapel,id_kelas,hari,jam,nama_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_jam_pelajaran.id_mapel');
        $query = $this->builder->get();
        $data = [
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam')
        ];
        $this->builder->where('id_jadwal', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Kelas Jam Pelajaran',
            'edit' => $edit,
            'kelasjampelajaran' => $query->getResult(),
            'kelasJamPelajaranInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelas/JamPelajaranview', $data);
    }
}
