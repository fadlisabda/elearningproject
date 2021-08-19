<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'data_guru';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip', 'nama_guru', 'tempat_lahir', 'tgl_lahir', 'no_telp', 'alamat'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_guru' => $id])->first();
    }
}
