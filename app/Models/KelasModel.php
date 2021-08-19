<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kelas', 'nip'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kelas' => $id])->first();
    }
}
