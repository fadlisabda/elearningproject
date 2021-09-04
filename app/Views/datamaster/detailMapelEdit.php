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
            <?php if ($_SESSION['status'] === 'guru') : ?>
                <h2>Ubah Data Detail Mapel</h2>
            <?php endif; ?>
            <?php if ($_SESSION['status'] === 'siswa') : ?>
                <h2>Tambah Tugas</h2>
            <?php endif; ?>
            <form action="<?= base_url(); ?>/detailmapel/update/<?= $detailmapel['id_detailmapel']; ?>/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="filelama" value="<?= $detailmapel['file']; ?>">
                <input type="hidden" name="tugassiswalama" value="<?= $detailmapel['tugassiswa']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label" style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>">judul</label>
                    <input type="<?= ($_SESSION['status'] === 'guru') ? 'text' : 'hidden'  ?>" class="form-control" id="judul" name="judul" value="<?= $detailmapel['judul']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label" style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>"><?= $detailmapel['keterangan']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="custom-file-label" style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>">File</label>
                    <input type="file" class="form-control" id="file" name="file_upload[]" style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>" multiple="true">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label" style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>">Link</label>
                    <input type="<?= ($_SESSION['status'] === 'guru') ? 'text' : 'hidden'  ?>" class="form-control" id="link" name="link" value="<?= $detailmapel['link']; ?>">
                </div>
                <?php $date = date("Y-m-d\TH:i:s", strtotime($detailmapel['tenggat'])); ?>
                <div class="mb-3">
                    <label style="display:<?= ($_SESSION['status'] === 'siswa') ? 'none' : ''  ?>" for="tenggat" class="form-label">Tenggat</label>
                    <input type="<?= ($_SESSION['status'] === 'guru') ? 'datetime-local' : 'hidden'  ?>" class="form-control" id="tenggat" name="tenggat" value="<?= $date; ?>">
                </div>
                <div class="mb-3">
                    <label for="tugassiswa" class="custom-file-label" style="display:<?= ($_SESSION['status'] === 'guru') ? 'none' : ''  ?>">Tugas Siswa</label>
                    <input type="file" class="form-control" id="tugassiswa" name="file_upload_ts[]" style="display:<?= ($_SESSION['status'] === 'guru') ? 'none' : ''  ?>" multiple="true">
                </div>
                <button type="submit" class="btn btn-primary"><?= ($_SESSION['status'] === 'guru') ? 'Ubah' : 'Tambah' ?></button>
                <?php if ($_SESSION['status'] === 'guru') : ?>
                    <a href="<?= base_url(); ?>/detailmapel/index/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" class="btn btn-danger">Kembali</a>
                <?php endif; ?>
                <?php if ($_SESSION['status'] === 'siswa') : ?>
                    <a href="<?= base_url(); ?>/detailmapel/siswa/<?= $detailmapel['id_detailmapel']; ?>?idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru'] ?>" class="btn btn-danger">Kembali</a>
                <?php endif; ?>
            </form>
            <script>
                <?php if ($_SESSION['status'] === 'siswa') : ?>
                    $('#keterangan').hide();
                <?php endif; ?>
                CKEDITOR.replace('keterangan');
            </script>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>