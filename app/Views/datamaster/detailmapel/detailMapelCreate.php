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
            <form action="<?= base_url(); ?>/detailmapel/save/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="namamapel" value="<?= $_GET['namamapel']; ?>">
                <input type="hidden" name="namakelas" value="<?= $_GET['namakelas']; ?>">
                <input type="hidden" name="namaguru" value="<?= $_GET['namaguru']; ?>">
                <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
                <input type="hidden" name="status" value="<?= $_SESSION['status']; ?>">
                <div class="mb-3">
                    <label for="judul">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                <div class="mb-3 custom-file">
                    <label for="file" class="custom-file-label" name="labelfile">File</label>
                    <input type="file" class="custom-file-input" id="file" name="file_upload[]" multiple="true">
                </div>
                <div class="mb-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="PISAH DENGAN SPASI JIKA INGIN INPUT LEBIH DARI 1 LINK">
                </div>
                <div class="mb-3">
                    <label for="tenggat">Tenggat</label>
                    <input type="datetime-local" class="form-control" id="tenggat" name="tenggat">
                </div>
                <label for="tipe">Tipe</label>
                <select class="custom-select mb-3" id="tipe" name="tipe">
                    <option value="materi">Materi</option>
                    <option value="tugas">Tugas</option>
                </select>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/detailmapel/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" class="btn btn-danger">Kembali</a>
            </form>
            <script>
                CKEDITOR.replace('keterangan');
            </script>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>