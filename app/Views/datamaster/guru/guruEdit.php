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
            <h2>Ubah Data Guru</h2>
            <form action="<?= base_url(); ?>/guru/update/<?= $guru['id_guru']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nip" class="form-label">Nip</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="<?= $guru['nip']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?= $guru['nama_guru']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $guru['tempat_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $guru['tgl_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= $guru['no_telp']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $guru['alamat']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/guru" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>