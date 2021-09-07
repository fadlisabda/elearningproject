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
            <h2>Edit Data Kelas Mapel</h2>
            <form action="<?= base_url(); ?>/kelasmapelcontroller/update/<?= $kelasmapel['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_mapel" class="form-label">Id Mapel</label>
                    <input type="number" class="form-control" id="id_mapel" name="id_mapel" value="<?= $kelasmapel['id_mapel']; ?>" required>
                </div>
                <div class=" mb-3">
                    <label for="id_kelas" class="form-label">Id Kelas</label>
                    <input type="number" class="form-control" id="id_kelas" name="id_kelas" value="<?= $kelasmapel['id_kelas']; ?>" required>
                </div>
                <div class=" mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="<?= $kelasmapel['nip']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="<?= base_url(); ?>/kelasMapelcontroller/index/<?= $id; ?>/<?= $namakelas; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>