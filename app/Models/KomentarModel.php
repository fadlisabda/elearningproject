<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'el_komentar';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_detailmapel', 'namamapel', 'namakelas', 'namaguru', 'username', 'komentar', 'status', 'tipe'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_komentar' => $id])->first();
    }
    public function search($keyword)
    {
        return $this->table('el_komentar')->like('username', $keyword)->orLike('komentar', $keyword);
    }
}
