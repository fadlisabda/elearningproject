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
            <h2>Tambah Data Guru</h2>
            <form action="<?= base_url(); ?>/guru/save?page_data_guru=<?= $_GET['page_data_guru']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nip" class="form-label <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>">Nip</label>
                    <input type="number" class="form-control" id="nip" name="nip" required value="<?= old('nip'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" required value="<?= old('nama_guru'); ?>">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required value="<?= old('tempat_lahir'); ?>">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="<?= old('tgl_lahir'); ?>">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" required value="<?= old('no_telp'); ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= old('alamat'); ?>">
                </div>
                <label for="foto">Foto Guru</label>
                <div>
                    <img src="<?= base_url(); ?>/public/file/default.jpg" class="img-thumbnail img-preview mb-2" width="200">
                </div>
                <div class="mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('fotoguru')) ? 'is-invalid' : ''; ?>" id="foto" name="fotoguru" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fotoguru'); ?>
                        </div>
                        <label class="custom-file-label" for="foto" id="labelfoto">Pilih Foto</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/guru?page_data_guru=<?= $_GET['page_data_guru']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>