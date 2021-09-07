<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <h1 class="text-center">Selamat Datang <?= $_SESSION["status"]; ?></h1>
<?php elseif ($_SESSION["status"] === 'guru') : ?>
    <h1 class="text-center">Selamat Datang <?= $_SESSION["status"]; ?></h1>
<?php elseif ($_SESSION["status"] === 'siswa') : ?>
    <h1 class="text-center">Selamat Datang <?= $_SESSION["status"]; ?></h1>
<?php endif; ?>
<?= $this->endSection(); ?>