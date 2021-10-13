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
            <h2>Ubah Data Siswa</h2>
            <form action="<?= base_url(); ?>/siswa/update/<?= $siswa['id_siswa']; ?>?page_siswa=<?= $_GET['page_siswa']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $siswa['id_siswa']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $siswa['foto_siswa']; ?>">
                <div class="mb-3">
                    <label for="nis">NIS</label>
                    <input type="number" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" id="nis" name="nis" value="<?= ($validation->hasError('nis')) ? old('nis') : $siswa['nis'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nis'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" name="nisn" value="<?= ($validation->hasError('nisn')) ? old('nisn') : $siswa['nisn'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nisn'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $siswa['no_telp']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat']; ?>" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="pria" <?= ($siswa['jenis_kelamin'] == "pria") ? "checked" : "" ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Pria
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="wanita" <?= ($siswa['jenis_kelamin'] == "wanita") ? "checked" : "" ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Wanita
                    </label>
                </div>
                <label for="foto">Foto Siswa</label>
                <div>
                    <img src="<?= base_url(); ?>/public/file/<?= $siswa['foto_siswa']; ?>" class="img-thumbnail img-preview mb-2" width="200">
                </div>
                <div class="mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('fotosiswa')) ? 'is-invalid' : ''; ?>" id="foto" name="fotosiswa" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fotosiswa'); ?>
                        </div>
                        <label class="custom-file-label" for="foto" id="labelfoto"><?= $siswa['foto_siswa']; ?></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/siswa?page_siswa=<?= $_GET['page_siswa']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>