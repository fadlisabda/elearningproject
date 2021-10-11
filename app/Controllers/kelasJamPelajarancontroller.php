<?php

namespace App\Controllers;

use App\Models\KelasJamPelajaranModel;

class KelasJamPelajaranController extends BaseController
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
        $this->builder->select('id_jadwal,kelas_jam_pelajaran.id_mapel as kelas_jam_pelajaranid_mapel,kelas_jam_pelajaran.id_kelas as kelas_jam_pelajaranid_kelas,hari,jam,nama_mapel,nama_kelas');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_jam_pelajaran.id_mapel');
        $this->builder->join('kelas', 'kelas.id_kelas = kelas_jam_pelajaran.id_kelas');
        $query = $this->builder->getWhere(['kelas_jam_pelajaran.id_kelas' => $id]);

        $currentPage = $this->request->getVar('page_kelas_jam_pelajaran') ? $this->request->getVar('page_kelas_jam_pelajaran') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kelasjampelajaran = $this->dataModel->search($keyword);
        } else {
            $kelasjampelajaran = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Kelas Jam Pelajaran',
            'mapelkelas' => $query->getResult(),
            'kelasjampelajaran' => $kelasjampelajaran->where('id_kelas', $id)->paginate(5, 'kelas_jam_pelajaran'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage,
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
        $this->dataModel->save([
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . 'kelasjampelajaran/' . $_GET['id'] . '/' . $_GET['namakelas'] . '?page_kelas_jam_pelajaran=' . $_GET['page_kelas_jam_pelajaran']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_jadwal', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . 'kelasjampelajaran/' . $_GET['id'] . '/' . $_GET['namakelas'] . '?page_kelas_jam_pelajaran=' . $_GET['page_kelas_jam_pelajaran']);
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
        $data = [
            'id_mapel' => $this->request->getVar('id_mapel'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam')
        ];
        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . 'kelasjampelajaran/' . $_GET['id'] . '/' . $_GET['namakelas'] . '?page_kelas_jam_pelajaran=' . $_GET['page_kelas_jam_pelajaran']);
    }
}
