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
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA MATA PELAJARAN</th>
            <th scope="col">NAMA GURU</th>
            <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kelasmapel as $km) : ?>
            <tr>
                <?php if ($id === $km->id_kelas) : ?>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $km->nama_mapel; ?></td>
                    <td><?= $km->nama_guru; ?></td>
                    <td><a href="<?= base_url(); ?>/DetailMapel/index/<?= $km->id_kelas; ?>/<?= $km->nama_mapel; ?>/<?= $namakelas; ?>/<?= $km->nama_guru; ?>" class="btn btn-info">Detail Mapel</a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>