<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col">
            <h2>Tambah Data Jam Pelajaran</h2>
            <form action="<?= base_url(); ?>/kelasjampelajaran/save?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_mapel" class="form-label">Id Mapel</label>
                    <input type="number" class="form-control" id="id_mapel" name="id_mapel" required>
                </div>
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Id Kelas</label>
                    <input type="number" class="form-control" id="id_kelas" name="id_kelas" required>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <input type="text" class="form-control" id="hari" name="hari" required>
                </div>
                <div class="mb-3">
                    <label for="jam" class="form-label">jam</label>
                    <input type="text" class="form-control" id="jam" name="jam" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/kelasJamPelajaran/index/<?= $id; ?>/<?= $namakelas; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>