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
        $currentPage = $this->request->getVar('page_el_user') ? $this->request->getVar('page_el_user') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $el_user = $this->dataModel->search($keyword);
        } else {
            $el_user = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - ElUser',
            'eluser' => $el_user->paginate(2, 'el_user'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/eluser/eluserview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data ELUser',
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/eluser/eluserCreate', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'is_unique[el_user.username]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar'
                ],
            ]
        ])) {
            return redirect()->to(base_url() . '/eluser/create?page_el_user=' . $_GET['page_el_user'])->withInput();
        }
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->dataModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $passwordHash,
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/eluser?page_el_user=' . $_GET['page_el_user']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data ElUser',
            'eluser' => $this->dataModel->getData($id),
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/eluser/eluserEdit', $data);
    }

    public function update($id)
    {
        $elUserLama = $this->dataModel->getData($this->request->getVar('id'));
        if ($elUserLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[el_user.username]';
        }
        if (!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} sudah terdaftar'
                ],
            ]
        ])) {
            return redirect()->to(base_url() . '/eluser/edit/' . $id . '?page_el_user=' . $_GET['page_el_user'])->withInput();
        }
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $passwordHash,
            'status' => $this->request->getVar('status')
        ];

        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/eluser?page_el_user=' . $_GET['page_el_user']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_eluser', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/eluser?page_el_user=' . $_GET['page_el_user']);
    }
}
