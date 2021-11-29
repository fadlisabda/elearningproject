<?php

namespace App\Controllers;

use App\Models\KelasSiswaModel;

class KelasSiswaController extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new KelasSiswaModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('kelas_siswa');
    }
    public function index($id, $namakelas)
    {
        $this->builder->select('kelas_siswa.nis as kelas_siswanis,nama_siswa');
        $this->builder->join('siswa', 'siswa.nis = kelas_siswa.nis');
        $query = $this->builder->getWhere(['id_kelas' => $id]);

        $currentPage = $this->request->getVar('page_kelas_siswa') ? $this->request->getVar('page_kelas_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kelassiswa = $this->dataModel->search($keyword);
        } else {
            $kelassiswa = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Kelas Siswa',
            'namasiswa' => $query->getResult(),
            'kelassiswa' => $kelassiswa->where('id_kelas', $id)->paginate(1, 'kelas_siswa'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage,
            'id' => $id,
            'namakelas' => $namakelas
        ];
        return view('datamaster/kelas/Siswaview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas Siswa',
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas'],
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/kelas/SiswaCreate', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nis' => [
                'rules' => 'is_unique[kelas_siswa.nis]',
                'errors' => [
                    'is_unique' => '{field} siswa sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/kelassiswa/create?id=' . $_GET['id'] . '&namakelas=' . $_GET['namakelas'] . '&page_kelas_siswa=' . $_GET['page_kelas_siswa'])->withInput();
        }
        $this->dataModel->save([
            'nis' => $this->request->getVar('nis'),
            'id_kelas' => $this->request->getVar('id_kelas')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/kelassiswa/' . $_GET['id'] . '/' . $_GET['namakelas'] . '?page_kelas_siswa=' . $_GET['page_kelas_siswa']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $this->dataModel->where('id_kelas_siswa', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/kelassiswa/' . $_GET['id'] . '/' . $_GET['namakelas'] . '?page_kelas_siswa=' . $_GET['page_kelas_siswa']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Kelas Siswa',
            'kelassiswa' => $this->dataModel->getData($id),
            'id' => $_GET['id'],
            'namakelas' => $_GET['namakelas'],
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/kelas/SiswaEdit', $data);
    }

    public function update($id)
    {
        $kelasSiswaLama = $this->dataModel->getData($this->request->getVar('id'));
        if ($kelasSiswaLama['nis'] == $this->request->getVar('nis')) {
            $rule_nis = 'required';
        } else {
            $rule_nis = 'required|is_unique[kelas_siswa.nis]';
        }
        if (!$this->validate([
            'nis' => [
                'rules' => $rule_nis,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} siswa sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/kelassiswa/edit/' . $id . '?id=' . $_GET['id'] . '&namakelas=' . $_GET['namakelas'] . '&page_kelas_siswa=' . $_GET['page_kelas_siswa'])->withInput();
        }
        $data = [
            'nis' => $this->request->getVar('nis'),
            'id_kelas' => $this->request->getVar('id_kelas')
        ];
        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/kelassiswa/' . $_GET['id'] . '/' . $_GET['namakelas'] . '?page_kelas_siswa=' . $_GET['page_kelas_siswa']);
    }
}
