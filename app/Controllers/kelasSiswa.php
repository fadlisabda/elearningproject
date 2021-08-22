<?php

namespace App\Controllers;

class kelasSiswa extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_siswa');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_siswa.nis as kelas_siswanis,id_kelas,nama_siswa');
        $this->builder->join('siswa', 'siswa.nis = kelas_siswa.nis');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Siswa',
            'kelassiswa' => $query->getResult(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelasSiswa', $data);
    }
}
