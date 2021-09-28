<?php

namespace App\Controllers;

use App\Models\KelasMapelModel;

class kelasMapelcontroller extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasMapelModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_mapel');
    }
    public function index()
    {
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,kelas_mapel.id_kelas as kelas_mapelid_kelas,kelas_mapel.nip as kelas_mapelnip,nama_mapel,nama_guru,nama_kelas');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');
        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $this->builder->join('kelas', 'kelas.id_kelas = kelas_mapel.id_kelas');
        $this->builder->where('kelas_mapel.nip', $_SESSION["username"]);
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'kelasmapel' => $query->getResult(),
            'kelasMapelInsert' => $this->dataModel->getData(),
        ];
        return view('datamaster/kelas/Mapelview', $data);
    }

    public function admin($id, $namakelas)
    {
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'kelasMapelInsert' => $this->dataModel->getData(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelas/Mapelview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas Mapel',
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelas/MapelCreate', $data);
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
        return view('datamaster/kelas/Mapelview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
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
        return view('datamaster/kelas/Mapelview', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas Mapel',
            'kelasmapel' => $this->dataModel->getData($id),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelas/MapelEdit', $data);
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
        return view('datamaster/kelas/Mapelview', $data);
    }

    public function siswa()
    {
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,kelas_mapel.id_kelas as kelas_mapelid_kelas,nama_kelas,nama_mapel,kelas_mapel.nip as kelas_mapelnip,nama_guru');

        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');

        $this->builder->join('kelas_siswa', 'kelas_siswa.id_kelas = kelas_mapel.id_kelas');

        $this->builder->join('kelas', 'kelas.id_kelas = kelas_mapel.id_kelas');

        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $this->builder->where('kelas_siswa.nis', $_SESSION["username"]);
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Mapel Siswa',
            'kelasmapelsiswa' => $query->getResult(),
        ];
        return view('datamaster/kelas/mapelsiswaview', $data);
    }
}
