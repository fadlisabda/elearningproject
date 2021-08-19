<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailMapelModel extends Model
{
    protected $table = 'detail_mapel';
    protected $useTimestamps = true;
    protected $allowedFields = ['namamapel', 'namakelas', 'namaguru', 'judul', 'keterangan', 'file'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_detailmapel' => $id])->first();
    }
}
