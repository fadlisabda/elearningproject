<?php

namespace App\Controllers;

use App\Models\MapelModel;

class mapel extends BaseController
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
            'title' => 'FSELEARNING - Mapel',
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Mapel'
        ];

        return view('datamaster/mapelCreate', $data);
    }

    public function save()
    {
        $this->dataModel->save([
            'nama_mapel' => $this->request->getVar('nama_mapel')
        ]);
        $tambah = true;
        $data = [
            'title' => 'FSELEARNING - Mapel',
            'tambah' => $tambah,
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Mapel',
            'mapel' => $this->dataModel->getData($id)
        ];

        return view('datamaster/mapelEdit', $data);
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
            'title' => 'FSELEARNING - Mapel',
            'edit' => $edit,
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_mapel' => $id]);
        $delete = true;
        $data = [
            'title' => 'FSELEARNING - Mapel',
            'delete' => $delete,
            'mapel' => $this->dataModel->getData()
        ];
        return view('datamaster/mapel', $data);
    }
}
