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
            <h2>Ubah Data Detail Mapel</h2>
            <form action="<?= base_url(); ?>/detailmapelcontroller/update/<?= $detailmapel->getResult()[0]->id_detailmapel; ?>/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="filelama" value="<?= $detailmapel->getResult()[0]->file; ?>">
                <div class="mb-3">
                    <label for="judul">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $detailmapel->getResult()[0]->judul; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $detailmapel->getResult()[0]->keterangan; ?></textarea>
                </div>
                <div class="mb-3 custom-file">
                    <label for="file" class="custom-file-label" name="labelfile">File</label>
                    <input type="file" class="custom-file-input" id="file" name="file_upload[]" multiple="true">
                </div>
                <div class="mb-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?= $detailmapel->getResult()[0]->link; ?>">
                </div>
                <?php $date = date("Y-m-d\TH:i:s", strtotime($detailmapel->getResult()[0]->tenggat)); ?>
                <div class="mb-3">
                    <label for="tenggat">Tenggat</label>
                    <input type="datetime-local" class="form-control" id="tenggat" name="tenggat" value="<?= $date; ?>">
                </div>
                <label for="tipe">Tipe</label>
                <select class="custom-select mb-3" id="tipe" name="tipe">
                    <option <?= ($detailmapel->getResult()[0]->tipe == "materi") ? "selected" : "" ?> value="materi">Materi</option>
                    <option <?= ($detailmapel->getResult()[0]->tipe == "tugas") ? "selected" : "" ?> value="tugas">Tugas</option>
                </select>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/detailmapelcontroller/index/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" class="btn btn-danger">Kembali</a>
            </form>
            <script>
                CKEDITOR.replace('keterangan');
            </script>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>