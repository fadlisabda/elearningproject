<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'userelearning';
    public function getData($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
