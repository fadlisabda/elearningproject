<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasMapelModel extends Model
{
    protected $table = 'kelas_mapel';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_mapel', 'id_kelas', 'nip'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kelas_mapel' => $id])->first();
    }
}
