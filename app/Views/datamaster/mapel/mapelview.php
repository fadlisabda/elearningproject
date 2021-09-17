<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<a href="<?= base_url(); ?>/mapelcontroller/create" class="btn btn-primary mt-3 mb-3">Tambah Data Mapel</a>
<?php if (isset($edit)||isset($tambah)) : ?>
    <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA MATA PELAJARAN</th>
            <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($mapel as $m) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $m['nama_mapel'] ?></td>
                <td>
                    <a href="<?= base_url(); ?>/mapelcontroller/edit/<?= $m['id_mapel']; ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url(); ?>/mapelcontroller/delete/<?= $m['id_mapel']; ?>" class="btn btn-danger hapusdata">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>