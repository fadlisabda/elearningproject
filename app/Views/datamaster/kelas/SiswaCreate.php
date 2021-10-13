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
            <h2>Tambah Data Kelas Siswa</h2>
            <form action="<?= base_url(); ?>/kelassiswa/save?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_siswa=<?= $_GET['page_kelas_siswa']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nis">Nis</label>
                    <input type="number" class="form-control" id="nis" name="nis" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="id_kelas">Id Kelas</label>
                    <input type="number" class="form-control" id="id_kelas" name="id_kelas" required value="<?= old('id_kelas'); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/kelassiswa/<?= $id; ?>/<?= $namakelas; ?>?page_kelas_siswa=<?= $_GET['page_kelas_siswa']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>