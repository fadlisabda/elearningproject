<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Mapel Kelas Siswa <?= $kelasmapelsiswa[0]->nama_kelas; ?></h1>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
        <?php $i = 1; ?>
        <?php foreach ($kelasmapelsiswa as $kms) : ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-header"><?= $kms->nama_mapel; ?></div>
                    <div class="card-body">
                        <p class="card-text"><?= $kms->nama_guru; ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url(); ?>/detailmapel/<?= $kms->nama_mapel; ?>/<?= $kms->nama_kelas; ?>/<?= $kms->nama_guru; ?>" class="btn btn-info">Detail Mapel</a>

                        <a href="<?= base_url(); ?>/kelassiswa/<?= $kms->kelas_mapelid_kelas; ?>/<?= $kms->nama_kelas; ?>" class="btn btn-info">Data Siswa</a>

                        <a href="<?= base_url(); ?>/kelasjampelajaran/<?= $kms->kelas_mapelid_kelas; ?>/<?= $kms->nama_kelas; ?>" class="btn btn-info m-1">Jam Pelajaran</a>

                        <a href="<?= base_url(); ?>/kelas" class="btn btn-info m-1">Wali Kelas</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->endSection(); ?>