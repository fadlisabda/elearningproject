<?php

namespace App\Controllers;

use App\Models\EluserModel;

class Elusercontroller extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new EluserModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_data_el_user') ? $this->request->getVar('page_data_el_user') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $el_user = $this->dataModel->search($keyword);
        } else {
            $el_user = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - ElUser',
            'eluser' => $el_user->paginate(5, 'el_user'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/eluser/eluserview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data ELUser'
        ];

        return view('datamaster/eluser/eluserCreate', $data);
    }

    public function save()
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->dataModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $passwordHash,
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/eluser?page_data_el_user=' . $_GET['page_data_el_user']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data ElUser',
            'eluser' => $this->dataModel->getData($id)
        ];

        return view('datamaster/eluser/eluserEdit', $data);
    }

    public function update($id)
    {
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $passwordHash,
            'status' => $this->request->getVar('status')
        ];

        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/eluser?page_data_el_user=' . $_GET['page_data_el_user']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_eluser', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/eluser?page_data_el_user=' . $_GET['page_data_el_user']);
    }
}
