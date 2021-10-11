<?php

namespace App\Controllers;

use App\Models\KomentarModel;

class KomentarController extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new KomentarModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $elkomentar = $this->dataModel->search($keyword);
        } else {
            $elkomentar = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Komentar',
            'id' => $_GET['detailmapelsiswa'],
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru'],
            'komentar' => $this->dataModel->getData(),
        ];
        return view('datamaster/detailmapel/komentarview', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Komentar'
        ];

        return view('datamaster/detailmapel/komentarCreate', $data);
    }

    public function save($id)
    {
        $this->dataModel->save([
            'id_detailmapel' => $this->request->getVar('id_detailmapel'),
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'username' => $this->request->getVar('username'),
            'komentar' => $this->request->getVar('komentar'),
            'status' => $this->request->getVar('status'),
            'tipe' => $this->request->getVar('tipe')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/komentar?detailmapelsiswa=' . $id . '&namamapel=' . $_GET['namamapel'] . '&namakelas=' . $_GET['namakelas'] . '&namaguru=' . $_GET['namaguru'] . '&komentar=' . $_GET['komentar']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_komentar', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/komentar?detailmapelsiswa=' . $_GET['detailmapelsiswa'] . '&namamapel=' . $_GET['namamapel'] . '&namakelas=' . $_GET['namakelas'] . '&namaguru=' . $_GET['namaguru'] . '&komentar=' . $_GET['status']);
    }
}
