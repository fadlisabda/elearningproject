<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'data_guru';
    protected $primaryKey = 'id_guru';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nip', 'nama_guru', 'tempat_lahir', 'tgl_lahir', 'no_telp', 'alamat', 'foto_guru'];
    public function search($keyword)
    {
        return $this->table('data_guru')->like('nip', $keyword)->orLike('nama_guru', $keyword);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_guru' => $id])->first();
    }
}
