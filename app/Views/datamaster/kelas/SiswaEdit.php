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
            <h2>Edit Data Kelas Siswa</h2>
            <form action="<?= base_url(); ?>/kelassiswa/update/<?= $kelassiswa['id_kelas_siswa']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nis">Nis</label>
                    <input type="number" class="form-control" id="nis" name="nis" value="<?= $kelassiswa['nis']; ?>" required>
                </div>
                <div class=" mb-3">
                    <label for="id_kelas">Id Kelas</label>
                    <input type="number" class="form-control" id="id_kelas" name="id_kelas" value="<?= $kelassiswa['id_kelas']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="<?= base_url(); ?>/kelassiswa/<?= $id; ?>/<?= $namakelas; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>