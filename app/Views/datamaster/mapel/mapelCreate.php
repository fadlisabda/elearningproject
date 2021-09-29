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
            <h2>Tambah Data Mapel</h2>
            <form action="<?= base_url(); ?>/mapel/save" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_mapel">Nama Mapel</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/mapel" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>