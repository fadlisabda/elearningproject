<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<a href="<?= base_url(); ?>/guru/create" class="btn btn-primary mt-3 mb-3">Tambah Data Guru</a>
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
                    <a href="<?= base_url(); ?>/guru/edit/<?= $g['id_guru']; ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url(); ?>/guru/delete/<?= $g['id_guru']; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>