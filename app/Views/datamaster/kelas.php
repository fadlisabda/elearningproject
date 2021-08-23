<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<a href="<?= base_url(); ?>/kelas/create" class="btn btn-primary mt-3 mb-3">Tambah Data Kelas</a>
<?php if (isset($delete)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus
    </div>
<?php endif; ?>
<?php if (isset($edit)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Edit
    </div>
<?php endif; ?>
<?php if (isset($tambah)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Tambah
    </div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA KELAS</th>
            <th scope="col">NIP</th>
            <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kelas as $k) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $k['nama_kelas'] ?></td>
                <td><?= $k['nip'] ?></td>
                <td>
                    <a href="<?= base_url(); ?>/kelas/edit/<?= $k['id_kelas']; ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url(); ?>/kelas/delete/<?= $k['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                    <br>
                    <a href="<?= base_url(); ?>/kelasSiswa/index/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas'] ?>" class="btn btn-info mt-2">Data Siswa</a>
                    <a href="<?= base_url(); ?>/kelasMapel/index/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas'] ?>" class="btn btn-info mt-2">Mata Pelajaran</a>
                    <a href="<?= base_url(); ?>/kelasJamPelajaran/index/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas'] ?>" class="btn btn-info mt-2">Jam Pelajaran</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>