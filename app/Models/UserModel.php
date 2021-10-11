<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['username', 'nama_user', 'password_hash', 'level_user', 'status_user'];
    public function search($keyword)
    {
        return $this->table('user')->like('username', $keyword);
    }

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id])->first();
    }
}
