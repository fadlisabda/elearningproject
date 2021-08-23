<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'el_user';
    public function getData($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
