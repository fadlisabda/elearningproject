<?php

namespace App\Controllers;

use App\Models\DetailMapelModel;

class komentarController extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new DetailMapelModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('el_komentar');
    }
    public function index()
    {
        $data = [
            'title' => 'Komentar',
            'id' => $_GET['detailmapelsiswa'],
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru'],
            'komentar' => $this->builder->get()
        ];
        return view('datamaster/detailmapel/komentarview', $data);
    }
    public function createKomentar()
    {
        $data = [
            'title' => 'Tambah Komentar'
        ];

        return view('datamaster/detailmapel/komentarCreate', $data);
    }

    public function saveKomentar($id)
    {
        $data = [
            'id_detailmapel' => $this->request->getVar('id_detailmapel'),
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'username' => $this->request->getVar('username'),
            'komentar' => $this->request->getVar('komentar'),
            'status' => $this->request->getVar('status'),
            'tipe' => $this->request->getVar('tipe')
        ];
        $this->builder->insert($data);
        $tambah = true;
        $data = [
            'id' => $id,
            'tambah' => $tambah,
            'idkelas' => $_GET['idkelas'],
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru'],
            'komentar' => $_GET['komentar']
        ];

        return redirect()->to(base_url() . '/komentarController/index/?detailmapelsiswa=' . $data['id'] . '&idkelas=' . $data['idkelas'] . '&namamapel=' . $data['namamapel'] . '&namakelas=' . $data['namakelas'] . '&namaguru=' . $data['namaguru'] . '&komentar=' . $data['komentar'] . '&tambah=true');
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
            exit;
        }
        $this->builder->delete(['id_komentar' => $id]);
        $data = [
            'idkelas' => $_GET['idkelas'],
            'id' => $_GET['detailmapelsiswa'],
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru'],
            'status' => $_GET['status']
        ];
        return redirect()->to(base_url() . '/komentarController/index/?detailmapelsiswa=' . $data['id'] . '&idkelas=' . $data['idkelas'] . '&namamapel=' . $data['namamapel'] . '&namakelas=' . $data['namakelas'] . '&namaguru=' . $data['namaguru'] . '&komentar=' . $data['status'] . '&delete=true');
    }
}
