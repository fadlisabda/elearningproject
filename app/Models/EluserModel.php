<?php

namespace App\Models;

use CodeIgniter\Model;

class EluserModel extends Model
{
    protected $table = 'el_user';
    protected $allowedFields = ['username', 'password', 'status'];
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
