<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'FSELEARNING'
        ];
        return view('home/index', $data);
    }
}
