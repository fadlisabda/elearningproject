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
            <h2>Tambah Data Kelas Mapel</h2>
            <form action="<?= base_url(); ?>/kelasmapel/save?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_mapel=<?= $_GET['page_kelas_mapel']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_mapel">Id Mapel</label>
                    <input type="number" class="form-control" id="id_mapel" name="id_mapel" required>
                </div>
                <div class="mb-3">
                    <label for="id_kelas">Id Kelas</label>
                    <input type="number" class="form-control" id="id_kelas" name="id_kelas" required>
                </div>
                <div class="mb-3">
                    <label for="nip">Nip</label>
                    <input type="number" class="form-control" id="nip" name="nip" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/kelasmapel/<?= $id; ?>/<?= $namakelas; ?>?page_kelas_mapel=<?= $_GET['page_kelas_mapel']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>