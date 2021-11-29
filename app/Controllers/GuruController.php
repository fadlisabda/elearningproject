<?php

namespace App\Controllers;

use App\Models\GuruModel;

class GuruController extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new GuruModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_data_guru') ? $this->request->getVar('page_data_guru') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $guru = $this->dataModel->search($keyword);
        } else {
            $guru = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Guru',
            'guru' => $guru->paginate(5, 'data_guru'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/guru/guruview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Guru',
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/guru/gurucreate', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'is_unique[data_guru.nip]',
                'errors' => [
                    'is_unique' => '{field} guru sudah terdaftar'
                ]
            ],
            'fotoguru' => [
                'rules' => 'max_size[fotoguru,1024]|is_image[fotoguru]|mime_in[fotoguru,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/guru/create?page_data_guru=' . $_GET['page_data_guru'])->withInput();
        }
        $fileFoto = $this->request->getFile('fotoguru');
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('/xampp/htdocs/elearning/public/file/', $namaFoto);
        }
        $this->dataModel->save([
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'foto_guru' => $namaFoto
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/guru?page_data_guru=' . $_GET['page_data_guru']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }

        $fotoguru = $this->dataModel->find($id);
        if ($fotoguru['foto_guru'] != 'default.jpg' && file_exists('/xampp/htdocs/elearning/public/file/' . $fotoguru['foto_guru'])) {
            unlink('/xampp/htdocs/elearning/public/file/' . $fotoguru['foto_guru']);
        }
        $this->dataModel->where('id_guru', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/guru?page_data_guru=' . $_GET['page_data_guru']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Guru',
            'validation' => \Config\Services::validation(),
            'guru' => $this->dataModel->getData($id)
        ];

        return view('datamaster/guru/guruedit', $data);
    }

    public function update($id)
    {
        $guruLama = $this->dataModel->getData($this->request->getVar('id'));
        if ($guruLama['nip'] == $this->request->getVar('nip')) {
            $rule_nip = 'required';
        } else {
            $rule_nip = 'required|is_unique[data_guru.nip]';
        }
        if (!$this->validate([
            'nip' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} guru sudah terdaftar'
                ]
            ],
            'fotoguru' => [
                'rules' => 'max_size[fotoguru,1024]|is_image[fotoguru]|mime_in[fotoguru,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/guru/edit/' . $this->request->getVar('id') . '?page_data_guru=' . $_GET['page_data_guru'])->withInput();
        }
        $fileFoto = $this->request->getFile('fotoguru');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else if ($this->request->getVar('fotoLama') == 'default.jpg') {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('/xampp/htdocs/elearning/public/file/', $namaFoto);
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('/xampp/htdocs/elearning/public/file/', $namaFoto);
            unlink('/xampp/htdocs/elearning/public/file/' . $this->request->getVar('fotoLama'));
        }
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'foto_guru' => $namaFoto
        ];

        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/guru?page_data_guru=' . $_GET['page_data_guru']);
    }
}
