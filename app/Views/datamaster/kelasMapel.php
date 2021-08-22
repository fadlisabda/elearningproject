<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Mapel Kelas <?= $namakelas; ?></h1>
<a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
<br><br>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php $i = 1; ?>
    <?php foreach ($kelasmapel as $km) : ?>
        <?php if ($id === $km->id_kelas) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-header"><?= $km->nama_mapel; ?></div>
                    <div class="card-body">
                        <p class="card-text"><?= $km->nama_guru; ?></p>
                    </div>
                    <div class="card-footer"><a href="<?= base_url(); ?>/DetailMapel/index/<?= $km->id_kelas; ?>/<?= $km->nama_mapel; ?>/<?= $namakelas; ?>/<?= $km->nama_guru; ?>" class="btn btn-info">Detail Mapel</a></div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?= $this->endSection(); ?>