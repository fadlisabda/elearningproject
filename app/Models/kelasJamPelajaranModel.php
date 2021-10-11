<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasJamPelajaranModel extends Model
{
    protected $table = 'kelas_jam_pelajaran';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['id_mapel', 'id_kelas', 'hari', 'jam'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    public function search($keyword)
    {
        return $this->table('kelas_jam_pelajaran')->like('hari', $keyword)->orLike('jam', $keyword);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_jadwal' => $id])->first();
    }
}
