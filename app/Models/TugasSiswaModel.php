<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasSiswaModel extends Model
{
    protected $table = 'el_tugas_siswa';
    protected $allowedFields = ['id_detailmapel', 'namamapel', 'namakelas', 'namaguru', 'nis', 'filetugas', 'linktugas'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    public function search($keyword)
    {
        return $this->table('el_tugas_siswa')->like('nis', $keyword);
    }
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
