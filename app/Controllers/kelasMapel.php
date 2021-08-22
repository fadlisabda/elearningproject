<?php

namespace App\Controllers;

class kelasMapel extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_mapel');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_mapel.id_mapel as kelas_mapelid_mapel,id_kelas,nama_mapel,kelas_mapel.nip as kelas_mapelnip,nama_guru,id_kelas_mapel');
        $this->builder->join('data_mata_pelajaran', 'data_mata_pelajaran.id_mapel = kelas_mapel.id_mapel');
        $this->builder->join('data_guru', 'data_guru.nip = kelas_mapel.nip');
        $query = $this->builder->get();
        $data = [
            'title' => 'ELEARNING - Kelas Mapel',
            'kelasmapel' => $query->getResult(),
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelasMapel', $data);
    }
}
