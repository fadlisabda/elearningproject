<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailMapelModel extends Model
{
    protected $table = 'el_detail_mapel';
    protected $primaryKey = 'id_detailmapel';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['namamapel', 'namakelas', 'namaguru', 'username', 'judul', 'keterangan', 'file', 'link', 'tenggat', 'tipe', 'status'];
    public function search($keyword)
    {
        return $this->table('el_detail_mapel')->like('judul', $keyword)->orLike('tipe', $keyword);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_detailmapel' => $id])->first();
    }
}
