<?php

namespace App\Controllers;

use App\Models\TugasSiswaModel;
use App\Models\DetailMapelModel;

class DetailMapelController extends BaseController
{
    protected $detailMapelModel, $db, $builder, $tugasSiswaModel;
    public function __construct()
    {
        $this->tugasSiswaModel = new TugasSiswaModel();
        $this->detailMapelModel = new DetailMapelModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('el_detail_mapel');
    }

    public function index($namamapel, $namakelas, $namaguru)
    {
        $currentPage = $this->request->getVar('page_el_detail_mapel') ? $this->request->getVar('page_el_detail_mapel') : 1;
        $keyword = $this->request->getVar('keyword');
        $array = array('namamapel' => $namamapel, 'namakelas' => $namakelas, 'namaguru' => $namaguru);
        if ($keyword) {
            $eldetailmapel = $this->detailMapelModel->where($array)->search($keyword);
        } else {
            $eldetailmapel = $this->detailMapelModel->where($array);
        }
        $data = [
            'title' => 'ELEARNING - Detail Mapel',
            'detailmapel' => $eldetailmapel->paginate(5, 'el_detail_mapel'),
            'pager' => $this->detailMapelModel->pager,
            'currentPage' => $currentPage,
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
        $this->detailMapelModel->save([
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
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/detailmapel/' . $namamapel . '/' . $namakelas . '/' . $namaguru . '?page_el_detail_mapel=' . $_GET['page_el_detail_mapel']);
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
        if ($this->request->getVar('filelama') != null) {
            $str = explode('|', $this->request->getVar('filelama'));
            for ($j = 0; $j < count($str); $j++) {
                unlink('/xampp/htdocs/elearning/public/file/' . $str[$j]);
            }
        }
        $data = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => ($files['file_upload'][0]->getError() == 4) ? $namaFile : str_replace(' ', '', $namaFile),
            'link' => $this->request->getVar('link'),
            'tenggat' => (empty($this->request->getVar('tenggat'))) ? null : $this->request->getVar('tenggat'),
            'tipe' => $this->request->getVar('tipe')
        ];
        $this->detailMapelModel->update($id, $data);
        session()->setFlashData('pesan', 'Diedit');
        return redirect()->to(base_url() . '/detailmapel/' . $namamapel . '/' . $namakelas . '/' . $namaguru . '?page_el_detail_mapel=' . $_GET['page_el_detail_mapel']);
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

            $this->detailMapelModel->where('id_detailmapel', $id)->delete();
            session()->setFlashData('pesan', 'Dihapus');
            return redirect()->to(base_url() . '/detailmapel/' . $_GET['namamapel'] . '/' . $_GET['namakelas'] . '/' . $_GET['namaguru'] . '?page_el_detail_mapel=' . $_GET['page_el_detail_mapel']);
        }

        if ($_SESSION['status'] === 'siswa' && !empty($_GET['idtugassiswa'])) {
            $file = $this->tugasSiswaModel->getDataIdTugasSiswa($_GET['idtugassiswa']);

            $str2 = explode('|', $file['filetugas']);
            for ($i = 0; $i < count($str2); $i++) {
                if (file_exists('/xampp/htdocs/elearning/public/file/' . $str2[$i]) && $str2[$i] != null) {
                    unlink('/xampp/htdocs/elearning/public/file/' . $str2[$i]);
                }
                $this->tugasSiswaModel->where('id_tugassiswa', $_GET['idtugassiswa'])->delete();
            }
            session()->setFlashData('pesan', 'Dihapus');
            return redirect()->to(base_url() . '/detailmapel/siswa/' . $id . '?' . 'namamapel=' . $_GET['namamapel'] . '&' . 'namakelas=' . $_GET['namakelas'] . '&' . 'namaguru=' . $_GET['namaguru']);
        }
    }

    public function tugassiswa($id)
    {
        $currentPage = $this->request->getVar('page_el_tugas_siswa') ? $this->request->getVar('page_el_tugas_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $eltugassiswa = $this->tugasSiswaModel->search($keyword);
        } else {
            $eltugassiswa = $this->tugasSiswaModel;
        }
        $this->builder->where('id_detailmapel', $id);
        $array = array('namamapel' => $_GET['namamapel'], 'namakelas' => $_GET['namakelas'], 'namaguru' => $_GET['namaguru'], 'id_detailmapel' => $id);
        $data = [
            'title' => 'ELEARNING - Tugas Siswa',
            'detailmapel' => $this->builder->get(),
            'tugassiswa' => $eltugassiswa->where($array)->paginate(5, 'el_tugas_siswa'),
            'pager' => $this->tugasSiswaModel->pager,
            'currentPage' => $currentPage
        ];
        return view('datamaster/detailmapel/tugasSiswaView', $data);
    }

    public function siswa($id)
    {
        $this->builder->where('id_detailmapel', $id);
        $array = array('id_detailmapel' => $id, 'namamapel' => $_GET['namamapel'], 'namakelas' => $_GET['namakelas'], 'namaguru' => $_GET['namaguru'], 'nis' => $_SESSION['username']);
        $data = [
            'title' => 'Detail Mapel Siswa',
            'id' => $id,
            'tugassiswa' => $this->tugasSiswaModel->getdata(),
            'tugassiswaid' => $this->tugasSiswaModel->where($array)->first(),
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
        $this->tugasSiswaModel->save([
            'id_detailmapel' => $this->request->getVar('id_detailmapel'),
            'namamapel' => $this->request->getVar('namamapel'),
            'namakelas' => $this->request->getVar('namakelas'),
            'namaguru' => $this->request->getVar('namaguru'),
            'nis' => $this->request->getVar('nis'),
            'filetugas' => ($file->getError() === 4) ?  null : str_replace(' ', '', $namaFile),
            'linktugas' => (empty($this->request->getVar('link'))) ?  null : $this->request->getVar('link')
        ]);
        session()->setFlashData('pesan', 'Ditambah');
        return redirect()->to(base_url() . '/detailmapel/siswa/' . $id . '?' . 'namamapel=' . $_GET['namamapel'] . '&' . 'namakelas=' . $_GET['namakelas'] . '&' . 'namaguru=' . $_GET['namaguru']);
    }
}
