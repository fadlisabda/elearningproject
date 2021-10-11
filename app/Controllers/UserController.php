<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new UserModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->dataModel->search($keyword);
        } else {
            $user = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - User',
            'user' => $user->paginate(5, 'user'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/user/userview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data User'
        ];

        return view('datamaster/user/userCreate', $data);
    }

    public function save()
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->dataModel->save([
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password_hash' => $passwordHash,
            'level_user' => $this->request->getVar('level_user'),
            'status_user' => $this->request->getVar('flexRadioDefault')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/user?page_user=' . $_GET['page_user']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data User',
            'user' => $this->dataModel->getData($id)
        ];

        return view('datamaster/user/userEdit', $data);
    }

    public function update($id)
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password_hash' => $passwordHash,
            'level_user' => $this->request->getVar('level_user'),
            'status_user' => $this->request->getVar('flexRadioDefault')
        ];
        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/user?page_user=' . $_GET['page_user']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_user', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/user?page_user=' . $_GET['page_user']);
    }
}
