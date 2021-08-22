<?php

namespace App\Controllers;

class kelasJamPelajaran extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_jam_pelajaran');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_jam_pelajaran.id_mapel as kelas_jam_pelajaranid_mapel,id_kelas,hari,jam,nama_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_jam_pelajaran.id_mapel');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Jam Pelajaran',
            'kelasjampelajaran' => $query->getResult(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelasJamPelajaran', $data);
    }
}
