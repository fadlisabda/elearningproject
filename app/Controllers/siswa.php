<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class siswa extends BaseController
{
    protected $dataModel, $builder;
    public function __construct()
    {
        $this->dataModel = new SiswaModel();
        $db      = \Config\Database::connect();
        $this->builder = $db->table('siswa');
    }
    public function index()
    {
        $data = [
            'title' => 'ELEARNING - Siswa',
            'siswa' => $this->dataModel->getData()
        ];
        return view('datamaster/siswa', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Siswa'
        ];

        return view('datamaster/siswaCreate', $data);
    }

    public function save()
    {
        $this->dataModel->save([
            'nis' => $this->request->getVar('nis'),
            'nisn' => $this->request->getVar('nisn'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'no_telp' => $this->request->getVar('no_telp')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Siswa',
            'tambah' => $tambah,
            'siswa' => $this->dataModel->getData()
        ];
        return view('datamaster/siswa', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Siswa',
            'siswa' => $this->dataModel->getData($id)
        ];

        return view('datamaster/siswaEdit', $data);
    }

    public function update($id)
    {
        $data = [
            'nis' => $this->request->getVar('nis'),
            'nisn' => $this->request->getVar('nisn'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'no_telp' => $this->request->getVar('no_telp')
        ];

        $this->builder->where('id_siswa', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Siswa',
            'edit' => $edit,
            'siswa' => $this->dataModel->getData()
        ];
        return view('datamaster/siswa', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_siswa' => $id]);
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Siswa',
            'delete' => $delete,
            'siswa' => $this->dataModel->getData()
        ];
        return view('datamaster/siswa', $data);
    }
}
