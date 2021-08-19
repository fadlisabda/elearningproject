<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<a href="<?= base_url(); ?>/user/create" class="btn btn-primary mt-3 mb-3">Tambah Data User</a>
<?php if (isset($delete)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus
    </div>
<?php endif; ?>
<?php if (isset($edit)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Edit
    </div>
<?php endif; ?>
<?php if (isset($tambah)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Tambah
    </div>
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
        <?php foreach ($user as $u) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $u['username'] ?></td>
                <td>
                    <a href="<?= base_url(); ?>/user/edit/<?= $u['id_user']; ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url(); ?>/user/delete/<?= $u['id_user']; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>