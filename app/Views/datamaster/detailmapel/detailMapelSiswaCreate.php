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
            <h2>Kumpul Tugas</h2>
            <form action="<?= base_url(); ?>/detailmapel/savesiswa/<?= $_GET['detailmapelsiswa']; ?>?namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_detailmapel" value="<?= $_GET['detailmapelsiswa']; ?>">
                <input type="hidden" name="nis" value="<?= $_SESSION["username"]; ?>">
                <input type="hidden" name="namamapel" value="<?= $_GET['namamapel']; ?>">
                <input type="hidden" name="namakelas" value="<?= $_GET['namakelas']; ?>">
                <input type="hidden" name="namaguru" value="<?= $_GET['namaguru']; ?>">
                <input type="hidden" name="dikirim" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                            echo date("Y-m-d H:i:sa"); ?>">
                <div class="mb-3 custom-file">
                    <label for="file" class="custom-file-label" name="labelfile">File</label>
                    <input type="file" class="custom-file-input" id="file" name="file_upload[]" multiple="true">
                </div>
                <div class="mb-3">
                    <label for="link">Link Tugas</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="PISAH DENGAN SPASI JIKA INGIN INPUT LEBIH DARI 1 LINK">
                </div>

                <button type="submit" class="btn btn-primary">Kumpul</button>
                <a href="<?= base_url(); ?>/detailmapel/siswa/<?= $_GET['detailmapelsiswa']; ?>?namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru'] ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>