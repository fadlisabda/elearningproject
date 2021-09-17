<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col">
            <h2>Ubah Data Siswa</h2>
            <form action="<?= base_url(); ?>/siswacontroller/update/<?= $siswa['id_siswa']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nis">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" id="nisn" name="nisn" value="<?= $siswa['nisn']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $siswa['no_telp']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/siswacontroller" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>