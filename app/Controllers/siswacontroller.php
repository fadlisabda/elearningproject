<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class SiswaController extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new SiswaModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('siswa');
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $siswa = $this->dataModel->search($keyword);
        } else {
            $siswa = $this->dataModel;
        }
        $data = [
            'title' => 'ELEARNING - Siswa',
            'siswa' => $siswa->paginate(3, 'siswa'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/siswa/siswaview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Siswa',
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/siswa/siswaCreate', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nis' => [
                'rules' => 'is_unique[siswa.nis]',
                'errors' => [
                    'is_unique' => '{field} siswa sudah terdaftar'
                ]
            ],
            'nisn' => [
                'rules' => 'is_unique[siswa.nisn]',
                'errors' => [
                    'is_unique' => '{field} siswa sudah terdaftar'
                ]
            ],
            'fotosiswa' => [
                'rules' => 'max_size[fotosiswa,1024]|is_image[fotosiswa]|mime_in[fotosiswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/create?page_siswa=' . $_GET['page_siswa'])->withInput();
        }
        $fileFoto = $this->request->getFile('fotosiswa');
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('/xampp/htdocs/elearning/public/file/', $namaFoto);
        }
        $this->dataModel->save([
            'nis' => $this->request->getVar('nis'),
            'nisn' => $this->request->getVar('nisn'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $this->request->getVar('flexRadioDefault'),
            'foto_siswa' => $namaFoto
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/siswa?page_siswa=' . $_GET['page_siswa']);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Siswa',
            'siswa' => $this->dataModel->getData($id),
            'validation' => \Config\Services::validation()
        ];

        return view('datamaster/siswa/siswaEdit', $data);
    }

    public function update($id)
    {
        $siswaLama = $this->dataModel->getData($this->request->getVar('id'));
        if ($siswaLama['nis'] == $this->request->getVar('nis')) {
            $rule_nis = 'required';
        } else {
            $rule_nis = 'required|is_unique[siswa.nis]';
        }
        if ($siswaLama['nisn'] == $this->request->getVar('nisn')) {
            $rule_nisn = 'required';
        } else {
            $rule_nisn = 'required|is_unique[siswa.nisn]';
        }
        if (!$this->validate([
            'nis' => [
                'rules' => $rule_nis,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} siswa sudah terdaftar'
                ]
            ],
            'nisn' => [
                'rules' => $rule_nisn,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} siswa sudah terdaftar'
                ]
            ],
            'fotosiswa' => [
                'rules' => 'max_size[fotosiswa,1024]|is_image[fotosiswa]|mime_in[fotosiswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/edit/' . $this->request->getVar('id') . '?page_siswa=' . $_GET['page_siswa'])->withInput();
        }
        $fileFoto = $this->request->getFile('fotosiswa');
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
            'nis' => $this->request->getVar('nis'),
            'nisn' => $this->request->getVar('nisn'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_kelamin' => $this->request->getVar('flexRadioDefault'),
            'foto_siswa' => $namaFoto
        ];

        $this->dataModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/siswa?page_siswa=' . $_GET['page_siswa']);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        $fotosiswa = $this->dataModel->find($id);
        if ($fotosiswa['foto_siswa'] != 'default.jpg' && file_exists('/xampp/htdocs/elearning/public/file/' . $fotosiswa['foto_siswa'])) {
            unlink('/xampp/htdocs/elearning/public/file/' . $fotosiswa['foto_siswa']);
        }
        $this->dataModel->where('id_siswa', $id)->delete();
        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to(base_url() . '/siswa?page_siswa=' . $_GET['page_siswa']);
    }
}
