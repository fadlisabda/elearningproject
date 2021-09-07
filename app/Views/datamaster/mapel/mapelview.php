<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<a href="<?= base_url(); ?>/mapelcontroller/create" class="btn btn-primary mt-3 mb-3">Tambah Data Mapel</a>
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
                    <a href="<?= base_url(); ?>/mapelcontroller/delete/<?= $m['id_mapel']; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>