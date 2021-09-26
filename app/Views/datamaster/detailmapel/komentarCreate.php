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
            <h2>Tambah Komentar</h2>
            <form action="<?= base_url(); ?>/komentarController/saveKomentar/<?= $_GET['detailmapelsiswa']; ?>?idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&komentar=<?= $_GET['komentar']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="namamapel" value="<?= $_GET['namamapel']; ?>">
                <input type="hidden" name="namakelas" value="<?= $_GET['namakelas']; ?>">
                <input type="hidden" name="namaguru" value="<?= $_GET['namaguru']; ?>">
                <input type="hidden" name="id_detailmapel" value="<?= $_GET['detailmapelsiswa']; ?>">
                <input type="hidden" name="tipe" value="<?= $_SESSION['status']; ?>">

                <?php if ($_GET['komentar'] == 'pribadi' && $_SESSION['status'] == 'guru') : ?>
                    <input type="hidden" name="username" value="<?= $_GET["username"]; ?>">
                    <input type="hidden" name="status" value="pribadi">
                <?php endif; ?>

                <?php if ($_GET['komentar'] == 'pribadi' && $_SESSION['status'] == 'siswa') : ?>
                    <input type="hidden" name="username" value="<?= $_SESSION["username"]; ?>">
                    <input type="hidden" name="status" value="pribadi">
                <?php endif; ?>

                <?php if ($_GET['komentar'] == 'kelas') : ?>
                    <input type="hidden" name="username" value="<?= $_SESSION["username"]; ?>">
                    <input type="hidden" name="status" value="kelas">
                <?php endif; ?>

                <div class="mb-3">
                    <label for="komentar">Komentar</label>
                    <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/komentarcontroller/index/?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru'] ?>&komentar=<?= $_GET['komentar']; ?>" class="btn btn-danger">Kembali</a>
            </form>
            <script>
                CKEDITOR.replace('komentar');
            </script>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>