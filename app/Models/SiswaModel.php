<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nisn', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir', 'no_telp', 'foto_siswa'];
    public function search($keyword)
    {
        return $this->table('siswa')->like('nis', $keyword)->orLike('nama_siswa', $keyword);
    }

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_siswa' => $id])->first();
    }
}
