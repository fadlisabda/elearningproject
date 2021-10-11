<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasMapelModel extends Model
{
    protected $table = 'kelas_mapel';
    protected $primaryKey = 'id_kelas_mapel';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_mapel', 'id_kelas', 'nip'];
    public function search($keyword)
    {
        return $this->table('kelas_mapel')->like('nip', $keyword);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kelas_mapel' => $id])->first();
    }
}
