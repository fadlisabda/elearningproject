<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasSiswaModel extends Model
{
    protected $table = 'kelas_siswa';
    protected $primaryKey = 'id_kelas_siswa';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nis', 'id_kelas'];
    public function search($keyword)
    {
        return $this->table('kelas_siswa')->like('nis', $keyword);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kelas_siswa' => $id])->first();
    }
}
