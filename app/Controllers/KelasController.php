<?php

namespace App\Controllers;

use App\Models\KelasModel;

class KelasController extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas');
    }

    public function index()
    {
        $this->builder->select('kelas.nip as kelasnip,nama_guru');
        $this->builder->join('data_guru', 'data_guru.nip= kelas.nip');
        $query = $this->builder->get();
        $currentPage = $this->request->getVar('page_kelas') ? $this->request->getVar('page_kelas') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kelas = $this->dataModel->search($keyword);
        } else {
            $kelas = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Kelas',
            'namaguru' => $query->getResult(),
            'kelas' => $kelas->paginate(1, 'kelas'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/kelas/kelasview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas',
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/kelas/kelasCreate', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'is_unique[kelas.nip]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/kelas/create?page_kelas=' . $_GET['page_kelas'])->withInput();
        }
        $this->dataModel->save([
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip'  => $this->request->getVar('nip')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/kelas?page_kelas=' . $_GET['page_kelas']);
    }

    public function edit($id)
    {
        $this->builder->where('id_kelas', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'Ubah Data Kelas',
            'kelas' => $query->getResult(),
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/kelas/kelasEdit', $data);
    }

    public function update($id)
    {
        $kelasLama = $this->dataModel->getData($this->request->getVar('id'));
        if ($kelasLama['nip'] == $this->request->getVar('nip')) {
            $rule_nip = 'required';
        } else {
            $rule_nip = 'required|is_unique[kelas.nip]';
        }
        if (!$this->validate([
            'nip' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/kelas/edit/' . $id . '?page_kelas=' . $_GET['page_kelas'])->withInput();
        }
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'nip' => $this->request->getVar('nip')
        ];

        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/kelas?page_kelas=' . $_GET['page_kelas']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_kelas', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/kelas?page_kelas=' . $_GET['page_kelas']);
    }
}
