<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasJamPelajaranModel extends Model
{
    protected $table = 'kelas_jam_pelajaran';
    protected $allowedFields = ['id_mapel', 'id_kelas', 'hari', 'jam'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_jadwal' => $id])->first();
    }
}
