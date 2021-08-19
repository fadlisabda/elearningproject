<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Kelas Jam Pelajaran <?= $namakelas ?></h1>
<a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA MATA PELAJARAN</th>
            <th scope="col">HARI</th>
            <th scope="col">JAM</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kelasjampelajaran as $kjp) : ?>
            <tr>
                <?php if ($id === $kjp->id_kelas) : ?>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $kjp->nama_mapel; ?></td>
                    <td><?= $kjp->hari; ?></td>
                    <td><?= $kjp->jam; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>