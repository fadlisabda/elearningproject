<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kelas', 'nip'];
    public function search($keyword)
    {
        return $this->table('kelas')->like('nama_kelas', $keyword);
    }
}
