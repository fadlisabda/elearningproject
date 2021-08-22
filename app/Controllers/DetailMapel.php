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
            'title' => 'ELEARNING - Detail Mapel',
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
        if ($this->request->getFile('file')->getError() === 0) {
            $file = $this->request->getFile('file');
            $namaFile = $file->getName();
            $file->move('/xampp/htdocs/elearning/public/file/', $namaFile);
        }
        $this->dataModel->save([
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => (empty($file)) ?  null : $file->getName(),
            'link' => (empty($this->request->getVar('link'))) ?  null : $this->request->getVar('link')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
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
        $file = $this->request->getFile('file');
        if ($file->getError() == 4) {
            $namaFile = $this->request->getVar('filelama');
        } else if ($this->request->getVar('filelama') == null) {
            $namaFile = $file->getName();
            $file->move('/xampp/htdocs/elearning/public/file/', $namaFile);
        } else if ($this->request->getVar('filelama') != null) {
            $namaFile = $file->getName();
            $file->move('/xampp/htdocs/elearning/public/file/', $namaFile);
            unlink('/xampp/htdocs/elearning/public/file/' . $this->request->getVar('filelama'));
        }
        $data = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => $file->getName(),
            'link' => $this->request->getVar('link')
        ];

        $this->builder->where('id_detailmapel', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
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
        $file = $this->dataModel->getData($id);
        if (file_exists('/xampp/htdocs/elearning/public/file/' . $file['file']) && $file['file'] != null) {
            unlink('/xampp/htdocs/elearning/public/file/' . $file['file']);
        }
        $this->builder->delete(['id_detailmapel' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
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
