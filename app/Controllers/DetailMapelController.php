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

    public function index($idkelas, $namamapel, $namakelas, $namaguru)
    {
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $idkelas,
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

    public function save($idkelas, $namamapel, $namakelas, $namaguru)
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
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile),
            'link' => (empty($this->request->getVar('link'))) ?  null : $this->request->getVar('link'),
            'tenggat' => $this->request->getVar('tenggat')
        ]);
        $tambah = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'tambah' => $tambah,
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $idkelas,
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailmapel/detailMapelview', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => ($_SESSION['status'] === 'guru') ? 'Ubah Data Detail Mapel' : 'Tambah Tugas',
            'detailmapel' => $this->dataModel->getData($id)
        ];

        return view('datamaster/detailmapel/detailMapelEdit', $data);
    }

    public function update($id, $idkelas, $namamapel, $namakelas, $namaguru)
    {
        $files = $this->request->getFiles();
        $str = explode('|', $this->request->getVar('filelama'));
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
        if ($this->request->getVar('filelama') != null && $_SESSION['status'] === 'guru') {
            for ($i = 0; $i < count($str); $i++) {
                unlink('/xampp/htdocs/elearning/public/file/' . $str[$i]);
            }
        }

        $files2 = $this->request->getFiles();
        $str2 = explode('|', $this->request->getVar('tugassiswalama'));
        $namaFile2 = $files2['file_upload_ts'][0]->getName();
        $j = 0;
        foreach ($files2['file_upload_ts'] as $filets) {
            if ($filets->getError() == 4) {
                $namaFile2 = $this->request->getVar('tugassiswalama');
            } else if ($this->request->getVar('tugassiswalama') == null) {
                $filets->move('/xampp/htdocs/elearning/public/file/', str_replace(' ', '', $filets->getName()));
                if ($j !== 0) {
                    $namaFile2 .= '|';
                    $namaFile2 .= $filets->getName();
                }
            } else if ($this->request->getVar('tugassiswalama') != null) {
                $filets->move('/xampp/htdocs/elearning/public/file/', str_replace(' ', '', $filets->getName()));
                if ($j !== 0) {
                    $namaFile2 .= '|';
                    $namaFile2 .= $filets->getName();
                }
            }
            $j++;
        }
        if ($this->request->getVar('tugassiswalama') != null && $_SESSION['status'] === 'siswa') {
            for ($j = 0; $j < count($str2); $j++) {
                unlink('/xampp/htdocs/elearning/public/file/' . $str2[$j]);
            }
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($files['file_upload'][0]->getError() == 4) ? $namaFile : str_replace(' ', '', $namaFile),
            'link' => $this->request->getVar('link'),
            'tenggat' => (empty($this->request->getVar('tenggat'))) ? null : $this->request->getVar('tenggat'),
            'tugassiswa' => ($files2['file_upload_ts'][0]->getError() == 4) ? $namaFile2 : str_replace(' ', '', $namaFile2)
        ];
        $this->builder->where('id_detailmapel', $id);
        $this->builder->update($data);
        $edit = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'edit' => $edit,
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $idkelas,
            'namamapel' => $namamapel,
            'namakelas' => $namakelas,
            'namaguru' => $namaguru
        ];
        return view('datamaster/detailmapel/detailMapelview', $data);
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . base_url() . "/logincontroller");
            exit;
        }
        $file = $this->dataModel->getData($id);
        $str = explode('|', $file['file']);
        $str2 = explode('|', $file['tugassiswa']);

        if ($_SESSION['status'] === 'guru') {
            for ($i = 0; $i < count($str); $i++) {
                if (file_exists('/xampp/htdocs/elearning/public/file/' . $str[$i]) && $str[$i] != null) {
                    unlink('/xampp/htdocs/elearning/public/file/' . $str[$i]);
                }
            }
        }

        if ($_SESSION['status'] === 'siswa' || $_SESSION['status'] === 'guru') {
            for ($i = 0; $i < count($str2); $i++) {
                if (file_exists('/xampp/htdocs/elearning/public/file/' . $str2[$i]) && $str2[$i] != null) {
                    unlink('/xampp/htdocs/elearning/public/file/' . $str2[$i]);
                }
            }
            $data = [
                'tugassiswa' => null
            ];
            $this->builder->where('id_detailmapel', $id);
            $this->builder->update($data);
        }

        if ($_SESSION['status'] === 'guru') {
            $this->builder->delete(['id_detailmapel' => $id]);
        }
        $delete = true;
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'delete' => $delete,
            'detailmapel' => $this->dataModel->getData(),
            'idkelas' => $_GET['idkelas'],
            'namamapel' => $_GET['namamapel'],
            'namakelas' => $_GET['namakelas'],
            'namaguru' => $_GET['namaguru']
        ];
        return view('datamaster/detailmapel/detailMapelview', $data);
    }

    public function siswa($id)
    {
        $data = [
            'title' => 'Detail Mapel Siswa',
            'detailmapelsiswa' => $this->dataModel->getData($id)
        ];
        return view('datamaster/detailmapel/detailMapelSiswaview', $data);
    }
}
