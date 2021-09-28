<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/usercontroller/create" class="btn btn-primary mt-3 mb-3">Tambah Data User</a>
    <?php if (isset($edit) || isset($tambah)) : ?>
        <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
    <?php endif; ?>
    <?php if (isset($delete)) : ?>
        <div class="flash-data" data-flashdata="Dihapus"></div>
    <?php endif; ?>
    <div class="table-responsive">
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
                <?php foreach ($user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $u['username'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/usercontroller/edit/<?= $u['id_user']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url(); ?>/usercontroller/delete/<?= $u['id_user']; ?>" class="btn btn-danger hapusdata">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>