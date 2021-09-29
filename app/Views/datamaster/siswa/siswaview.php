<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/siswa/create" class="btn btn-primary mt-3 mb-3">Tambah Data Siswa</a>
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
                    <th scope="col">NIS</th>
                    <th scope="col">NAMA SISWA</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswa as $s) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $s['nis'] ?></td>
                        <td><?= $s['nama_siswa'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/siswa/edit/<?= $s['id_siswa']; ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/siswa/delete/<?= $s['id_siswa']; ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>