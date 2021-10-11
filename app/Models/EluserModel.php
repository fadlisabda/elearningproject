<?php

namespace App\Models;

use CodeIgniter\Model;

class EluserModel extends Model
{
    protected $table = 'el_user';
    protected $primaryKey = 'id_eluser';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['username', 'password', 'status'];
    public function search($keyword)
    {
        return $this->table('el_user')->like('username', $keyword);
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_eluser' => $id])->first();
    }
}
