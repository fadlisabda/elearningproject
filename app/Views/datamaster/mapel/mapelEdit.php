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
            <h2>Ubah Data Mapel</h2>
            <form action="<?= base_url(); ?>/mapel/update/<?= $mapel['id_mapel']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_mapel">Mapel</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?= $mapel['nama_mapel']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/mapel" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>