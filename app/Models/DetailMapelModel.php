<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailMapelModel extends Model
{
    protected $table = 'el_detail_mapel';
    protected $useTimestamps = true;
    protected $allowedFields = ['namamapel', 'namakelas', 'namaguru', 'judul', 'keterangan', 'file', 'link', 'tenggat', 'tugassiswa'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_detailmapel' => $id])->first();
    }
}
