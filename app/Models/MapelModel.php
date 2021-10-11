<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'data_mata_pelajaran';
    protected $primaryKey = 'id_mapel';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_mapel'];
    protected $useSoftDeletes = true;
    public function search($keyword)
    {
        return $this->table('data_mata_pelajaran')->like('nama_mapel', $keyword);
    }

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_mapel' => $id])->first();
    }
}
