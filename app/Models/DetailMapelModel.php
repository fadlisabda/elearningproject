<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailMapelModel extends Model
{
    protected $table = 'el_tugas_siswa';
    protected $allowedFields = ['id_detailmapel', 'namamapel', 'namakelas', 'namaguru', 'nis', 'filetugas', 'linktugas'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_detailmapel' => $id])->first();
    }
    public function getDataIdTugasSiswa($id)
    {
        return $this->where(['id_tugassiswa' => $id])->first();
    }
}
