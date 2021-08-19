<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'data_mata_pelajaran';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_mapel'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_mapel' => $id])->first();
    }
}
