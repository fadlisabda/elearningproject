<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Mapel Kelas Siswa <?= $kelasmapelsiswa[0]->nama_kelas; ?></h1>
<a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
<br><br>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php $i = 1; ?>
    <?php foreach ($kelasmapelsiswa as $kms) : ?>
        <div class="col">
            <div class="card">
                <div class="card-header"><?= $kms->nama_mapel; ?></div>
                <div class="card-body">
                    <p class="card-text"><?= $kms->nama_guru; ?></p>
                </div>
                <div class="card-footer"><a href="<?= base_url(); ?>/detailmapel/index/<?= $kms->kelas_mapelid_kelas; ?>/<?= $kms->nama_mapel; ?>/<?= $kms->nama_kelas; ?>/<?= $kms->nama_guru; ?>" class="btn btn-info">Detail Mapel</a></div>
            </div>
        </div>
    <?php endforeach; ?>
    <?= $this->endSection(); ?>