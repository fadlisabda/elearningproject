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
            <h2>Ubah Data Kelas</h2>
            <form action="<?= base_url(); ?>/kelas/update/<?= $kelas[0]->id_kelas; ?>?page_kelas=<?= $_GET['page_kelas']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $kelas[0]->nama_kelas; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nip">Nip</label>
                    <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" value="<?= ($validation->hasError('nip')) ? old('nip') : $kelas[0]->nip ?>" required>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/kelas?page_kelas=<?= $_GET['page_kelas']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>