<?php

namespace App\Controllers;

use App\Models\DetailMapelModel;

class DetailMapel extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new DetailMapelModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('detail_mapel');
    }

    public function index($idkelas, $namamapel, $namakelas, $namaguru)
    {
        $data = [
            'title' => 'FSELEARNING - Detail Mapel',
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $idkelas,
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailMapel', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Detail Mapel'
        ];

        return view('datamaster/detailMapelCreate', $data);
    }

    public function save($idkelas, $namamapel, $namakelas, $namaguru)
    {
        $this->dataModel->save([
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => $this->request->getVar('file')
        ]);
        $tambah = true;
        $data = [
            'title' => 'FSELEARNING - Detail Mapel',
            'tambah' => $tambah,
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $idkelas,
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailMapel', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Detail Mapel',
            'detailmapel' => $this->dataModel->getData($id)
        ];

        return view('datamaster/detailMapelEdit', $data);
    }

    public function update($id, $idkelas, $namamapel, $namakelas, $namaguru)
    {
        $data = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => $this->request->getVar('file')
        ];

        $this->builder->where('id_detailmapel', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'FSELEARNING - Detail Mapel',
            'edit' => $edit,
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $idkelas,
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailMapel', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_detailmapel' => $id]);
        $delete = true;
        $data = [
            'title' => 'FSELEARNING - Detail Mapel',
            'delete' => $delete,
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $_GET['idkelas'],
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru']
        ];
        return view('datamaster/detailMapel', $data);
    }
}
