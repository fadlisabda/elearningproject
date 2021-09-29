<?php

namespace App\Controllers;

use App\Models\KelasSiswaModel;

class KelasSiswaController extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasSiswaModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_siswa');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_siswa.nis as kelas_siswanis,id_kelas,nama_siswa,id_kelas_siswa');
        $this->builder->join('siswa', 'siswa.nis = kelas_siswa.nis');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Siswa',
            'kelassiswa' => $query->getResult(),
            'kelasSiswaInsert' => $this->dataModel->getData(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelas/Siswaview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas Siswa',
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelas/SiswaCreate', $data);
    }

    public function save()
    {
        $this->builder->select('kelas_siswa.nis as kelas_siswanis,id_kelas,nama_siswa,id_kelas_siswa');
        $this->builder->join('siswa', 'siswa.nis = kelas_siswa.nis');
        $query = $this->builder->get();
        $this->dataModel->save([
            'nis' => $this->request->getVar('nis'),
            'id_kelas' => $this->request->getVar('id_kelas')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Kelas Siswa',
            'tambah' => $tambah,
            'kelassiswa' => $query->getResult(),
            'kelasSiswaInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelas/Siswaview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->builder->delete(['id_kelas_siswa' => $id]);
        $this->builder->select('kelas_siswa.nis as kelas_siswanis,id_kelas,nama_siswa,id_kelas_siswa');
        $this->builder->join('siswa', 'siswa.nis = kelas_siswa.nis');
        $query = $this->builder->get();
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Kelas Siswa',
            'delete' => $delete,
            'kelassiswa' => $query->getResult(),
            'kelasSiswaInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelas/Siswaview', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas Siswa',
            'kelassiswa' => $this->dataModel->getData($id),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];

        return view('datamaster/kelas/SiswaEdit', $data);
    }

    public function update($id)
    {
        $data = [
            'nis' => $this->request->getVar('nis'),
            'id_kelas' => $this->request->getVar('id_kelas')
        ];
        $this->builder->where('id_kelas_siswa', $id);
        $this->builder->update($data);

        $this->builder->select('kelas_siswa.nis as kelas_siswanis,id_kelas,nama_siswa,id_kelas_siswa');
        $this->builder->join('siswa', 'siswa.nis = kelas_siswa.nis');
        $query = $this->builder->get();

        $edit = true;
        $data = [
            'title' => 'ELEARNING - Kelas Siswa',
            'edit' => $edit,
            'kelassiswa' => $query->getResult(),
            'kelasSiswaInsert' => $this->dataModel->getData(),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas']
        ];
        return view('datamaster/kelas/Siswaview', $data);
    }
}
