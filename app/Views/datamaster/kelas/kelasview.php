<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/kelas/create" class="btn btn-primary mt-3 mb-3">Tambah Data Kelas</a>
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
                    <th scope="col">NAMA KELAS</th>
                    <th scope="col">NAMA WALI KELAS</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kelas as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k->nama_kelas; ?></td>
                        <td><?= $k->nama_guru; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/kelas/edit/<?= $k->id_kelas; ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/kelas/delete/<?= $k->id_kelas; ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                            <br>

                            <a href="<?= base_url(); ?>/kelassiswa/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info m-1">Data Siswa</a>

                            <a href="<?= base_url(); ?>/kelasmapel/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info m-1">Mata Pelajaran</a>

                            <a href="<?= base_url(); ?>/kelasjampelajaran/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info m-1">Jam Pelajaran</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>