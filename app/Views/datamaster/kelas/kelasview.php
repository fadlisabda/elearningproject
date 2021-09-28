<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/kelascontroller/create" class="btn btn-primary mt-3 mb-3">Tambah Data Kelas</a>
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
                            <a href="<?= base_url(); ?>/kelascontroller/edit/<?= $k->id_kelas; ?>" class="btn btn-warning">Edit</a>

                            <a href="<?= base_url(); ?>/kelascontroller/delete/<?= $k->id_kelas; ?>" class="btn btn-danger hapusdata">Delete</a>
                            <br>

                            <a href="<?= base_url(); ?>/kelasSiswaController/index/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info mt-2">Data Siswa</a>

                            <a href="<?= base_url(); ?>/kelasMapelController/admin/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info mt-2">Mata Pelajaran</a>

                            <a href="<?= base_url(); ?>/kelasJamPelajarancontroller/index/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info mt-2">Jam Pelajaran</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>