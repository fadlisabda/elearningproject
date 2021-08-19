<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Kelas Siswa <?= $namakelas ?></h1>
<a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIS</th>
            <th scope="col">NAMA SISWA</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kelassiswa as $ks) : ?>
            <tr>
                <?php if ($id === $ks->id_kelas) : ?>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $ks->kelas_siswanis; ?></td>
                    <td><?= $ks->nama_siswa; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>