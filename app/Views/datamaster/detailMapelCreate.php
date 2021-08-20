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
            <h2>Tambah Data Detail Mapel</h2>
            <form action="<?= base_url(); ?>/detailmapel/save/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="namamapel" value="<?= $_GET['namamapel']; ?>">
                <input type="hidden" name="namakelas" value="<?= $_GET['namakelas']; ?>">
                <input type="hidden" name="namaguru" value="<?= $_GET['namaguru']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">link</label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/detailmapel/index/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>