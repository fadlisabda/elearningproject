<?php

namespace App\Controllers;

use App\Models\DetailMapelModel;

class DetailMapelController extends BaseController
{
    protected $dataModel, $db, $builder;
    public function __construct()
    {
        $this->dataModel = new DetailMapelModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('el_detail_mapel');
    }

    public function index($namamapel, $namakelas, $namaguru)
    {
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'detailmapel' => $this->builder->get(),
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailmapel/detailMapelview', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Detail Mapel'
        ];

        return view('datamaster/detailmapel/detailMapelCreate', $data);
    }

    public function save($namamapel, $namakelas, $namaguru)
    {
        $files = $this->request->getFiles();
        $namaFile = $files['file_upload'][0]->getName();
        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() === 0) {
                $file->move('/xampp/htdocs/elearning/public/file/', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaFile .= '|';
                    $namaFile .= $file->getName();
                }
            }
            $i++;
        }
        $tambah = true;
        $data = [
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'username' => $this->request->getVar('username'),
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile),
            'link' => (empty($this->request->getVar('link'))) ?  null : $this->request->getVar('link'),
            'tenggat' => $this->request->getVar('tenggat'),
            'tipe' => $this->request->getVar('tipe'),
            'status' => $this->request->getVar('status')
        ];
        $this->builder->insert($data);

        $data2 = [
            'title' => 'ELEARNING - Detail Mapel',
            'tambah' => $tambah,
            'detailmapel' => $this->builder->get(),
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailmapel/detailMapelview', $data2);
    }

    public function edit($id)
    {
        $this->builder->where('id_detailmapel', $id);
        $data = [
            'title' => 'Ubah Data Detail Mapel',
            'detailmapel' => $this->builder->get()
        ];

        return view('datamaster/detailmapel/detailMapelEdit', $data);
    }

    public function update($id, $namamapel, $namakelas, $namaguru)
    {
        $files = $this->request->getFiles();
        $namaFile = $files['file_upload'][0]->getName();
        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() == 4) {
                $namaFile = $this->request->getVar('filelama');
            } else if ($this->request->getVar('filelama') == null) {
                $file->move('/xampp/htdocs/elearning/public/file/', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaFile .= '|';
                    $namaFile .= $file->getName();
                }
            } else if ($this->request->getVar('filelama') != null) {
                $file->move('/xampp/htdocs/elearning/public/file/', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaFile .= '|';
                    $namaFile .= $file->getName();
                }
            }
            $i++;
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($files['file_upload'][0]->getError() == 4) ? $namaFile : str_replace(' ', '', $namaFile),
            'link' => $this->request->getVar('link'),
            'tenggat' => (empty($this->request->getVar('tenggat'))) ? null : $this->request->getVar('tenggat'),
            'tipe' => $this->request->getVar('tipe')
        ];
        $this->builder->where('id_detailmapel', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'edit' => $edit,
            'detailmapel' => $this->builder->get(),
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailmapel/detailMapelview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/login");
            exit;
        }
        if (empty($_GET['idtugassiswa'])) {
            $this->builder->where('id_detailmapel', $id);
            $file = $this->builder->get();
            $str = explode('|', $file->getResult()[0]->file);

            for ($i = 0; $i < count($str); $i++) {
                if (file_exists('/xampp/htdocs/elearning/public/file/' . $str[$i]) && $str[$i] != null) {
                    unlink('/xampp/htdocs/elearning/public/file/' . $str[$i]);
                }
            }

            $this->builder->delete(['id_detailmapel' => $id]);

            $delete = true;
            $data = [
                'title' => 'ELEARNING - Detail Mapel',
                'delete' => $delete,
                'detailmapel' => $this->builder->get(),
                'namamapel' => $_GET['namamapel'],
                'namakelas' => $_GET['namakelas'],
                'namaguru' => $_GET['namaguru']
            ];
            return view('datamaster/detailmapel/detailMapelview', $data);
        }

        if ($_SESSION['status'] === 'siswa' && !empty($_GET['idtugassiswa'])) {
            $file = $this->dataModel->getDataIdTugasSiswa($_GET['idtugassiswa']);

            $str2 = explode('|', $file['filetugas']);
            for ($i = 0; $i < count($str2); $i++) {
                if (file_exists('/xampp/htdocs/elearning/public/file/' . $str2[$i]) && $str2[$i] != null) {
                    unlink('/xampp/htdocs/elearning/public/file/' . $str2[$i]);
                }
                $this->dataModel->where('id_tugassiswa', $_GET['idtugassiswa'])->delete();
            }
            $delete = true;
            $data = [
                'title' => 'Detail Mapel Siswa',
                'delete' => $delete,
                'id' => $id,
                'tugassiswa' => $this->dataModel->getdata(),
                'tugassiswaid' => $this->dataModel->getdata($id),
                'detailmapel' => $this->builder->get()
            ];
            return view('datamaster/detailmapel/detailMapelSiswaview', $data);
        }
    }

    public function tugassiswa($id)
    {
        $this->builder->where('id_detailmapel', $id);
        $data = [
            'title' => 'ELEARNING - Tugas Siswa',
            'id' => $id,
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru'],
            'detailmapel' => $this->builder->get(),
            'tugassiswa' => $this->dataModel->getData()
        ];
        return view('datamaster/detailmapel/tugasSiswaView', $data);
    }

    public function siswa($id)
    {
        $this->builder->where('id_detailmapel', $id);
        $data = [
            'title' => 'Detail Mapel Siswa',
            'id' => $id,
            'tugassiswa' => $this->dataModel->getdata(),
            'tugassiswaid' => $this->dataModel->getdata($id),
            'detailmapel' => $this->builder->get()
        ];
        return view('datamaster/detailmapel/detailMapelSiswaview', $data);
    }

    public function createsiswa()
    {
        $data = [
            'title' => 'Form Tambah Tugas'
        ];

        return view('datamaster/detailmapel/detailMapelSiswaCreate', $data);
    }

    public function savesiswa($id)
    {
        $files = $this->request->getFiles();
        $namaFile = $files['file_upload'][0]->getName();

        $i = 0;
        foreach ($files['file_upload'] as $file) {
            if ($file->getError() === 0) {
                $file->move('/xampp/htdocs/elearning/public/file/', str_replace(' ', '', $file->getName()));
                if ($i !== 0) {
                    $namaFile .= '|';
                    $namaFile .= $file->getName();
                }
            }
            $i++;
        }
        $this->dataModel->save([
            'id_detailmapel' => $this->request->getVar('id_detailmapel'),
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'nis' => $this->request->getVar('nis'),
            'filetugas' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile),
            'linktugas' => (empty($this->request->getVar('link'))) ?  null : $this->request->getVar('link')
        ]);
        $this->builder->where('id_detailmapel', $id);
        $tambah = true;
        $data = [
            'title' => 'Detail Mapel Siswa',
            'id' => $id,
            'tambah' => $tambah,
            'tugassiswa' => $this->dataModel->getdata(),
            'tugassiswaid' => $this->dataModel->getdata($id),
            'detailmapel' => $this->builder->get()
        ];

        return view('datamaster/detailmapel/detailmapelsiswaview', $data);
    }
}
