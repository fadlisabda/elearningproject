<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-center display-4">Selamat Datang <?= $_SESSION["status"]; ?></h1>
        </div>
    </div>
<?php elseif ($_SESSION["status"] === 'guru') : ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-center display-4">Selamat Datang <?= $_SESSION["status"]; ?></h1>
        </div>
    </div>
<?php elseif ($_SESSION["status"] === 'siswa') : ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-center display-4">Selamat Datang <?= $_SESSION["status"]; ?></h1>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>