<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/guru/create" class="btn btn-primary mt-3 mb-3">Tambah Data Guru</a>
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
                    <th scope="col">NAMA GURU</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">NO TELP</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($guru as $g) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $g['nip'] ?></td>
                        <td><?= $g['nama_guru'] ?></td>
                        <td><?= $g['tempat_lahir'] ?></td>
                        <td><?= $g['tgl_lahir'] ?></td>
                        <td><?= $g['no_telp'] ?></td>
                        <td><?= $g['alamat'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/guru/edit/<?= $g['id_guru']; ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/guru/delete/<?= $g['id_guru']; ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>