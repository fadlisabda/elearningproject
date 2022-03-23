<?php

namespace App\Controllers;

use App\Models\MapelModel;

class MapelController extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new MapelModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_data_mata_pelajaran') ? $this->request->getVar('page_data_mata_pelajaran') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $mapel = $this->dataModel->search($keyword);
        } else {
            $mapel = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Mapel',
            'mapel' => $mapel->paginate(5, 'data_mata_pelajaran'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/mapel/mapelview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Mapel'
        ];

        return view('datamaster/mapel/mapelCreate', $data);
    }

    public function save()
    {
        $this->dataModel->save([
            'nama_mapel' => $this->request->getVar('nama_mapel')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/mapel?page_data_mata_pelajaran=' . $_GET['page_data_mata_pelajaran']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Mapel',
            'mapel' => $this->dataModel->getData($id)
        ];

        return view('datamaster/mapel/mapelEdit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_mapel' => $this->request->getVar('nama_mapel')
        ];

        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/mapel?page_data_mata_pelajaran=' . $_GET['page_data_mata_pelajaran']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_mapel', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/mapel?page_data_mata_pelajaran=' . $_GET['page_data_mata_pelajaran']);
    }
}
