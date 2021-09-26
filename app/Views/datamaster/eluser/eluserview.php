<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<a href="<?= base_url(); ?>/elusercontroller/create" class="btn btn-primary mt-3 mb-3">Tambah Data ElUser</a>
<?php if (isset($edit) || isset($tambah)) : ?>
    <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
<?php endif; ?>
<?php if (isset($delete)) : ?>
    <div class="flash-data" data-flashdata="Dihapus"></div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">USERNAME</th>
            <th scope="col">AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($eluser as $eu) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $eu['username'] ?></td>
                <td>
                    <a href="<?= base_url(); ?>/elusercontroller/edit/<?= $eu['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url(); ?>/elusercontroller/delete/<?= $eu['id']; ?>" class="btn btn-danger hapusdata">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>