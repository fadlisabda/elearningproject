<?php

namespace App\Controllers;

use App\Models\MapelModel;

class mapelcontroller extends BaseController
{
    protected $dataModel, $builder;
    public function __construct()
    {
        $this->dataModel = new MapelModel();
        $db      = \Config\Database::connect();
        $this->builder = $db->table('data_mata_pelajaran');
    }
    public function index()
    {
        $data = [
            'title' => 'ELEARNING - Mapel',
            'mapel' => $this->dataModel->getData()
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
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Mapel',
            'tambah' => $tambah,
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel/mapelview', $data);
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

        $this->builder->where('id_mapel', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Mapel',
            'edit' => $edit,
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel/mapelview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
            exit;
        }
        $this->builder->delete(['id_mapel' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Mapel',
            'delete' => $delete,
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel/mapelview', $data);
    }
}
