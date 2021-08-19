<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nisn', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir', 'no_telp'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_siswa' => $id])->first();
    }
}
