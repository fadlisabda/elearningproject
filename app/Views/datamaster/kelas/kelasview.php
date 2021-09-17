<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <a href="<?= base_url(); ?>/kelascontroller/create" class="btn btn-primary mt-3 mb-3">Tambah Data Kelas</a>
    <?php if (isset($edit)||isset($tambah)) : ?>
        <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
    <?php endif; ?>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA KELAS</th>
            <?php if ($_SESSION["status"] === 'admin') : ?>
                <th scope="col">NIP</th>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === 'guru') : ?>
                <th scope="col">NAMA WALI KELAS</th>
            <?php endif; ?>
            <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_SESSION["status"] === 'admin') : ?>
            <?php $i = 1; ?>
            <?php foreach ($kelasInsert as $ki) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $ki['nama_kelas']; ?></td>
                    <td><?= $ki['nip']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>/kelascontroller/edit/<?= $ki['id_kelas']; ?>" class="btn btn-warning">Edit</a>

                        <a href="<?= base_url(); ?>/kelascontroller/delete/<?= $ki['id_kelas']; ?>" class="btn btn-danger hapusdata">Delete</a>
                        <br>

                        <a href="<?= base_url(); ?>/kelasSiswaController/index/<?= $ki['id_kelas']; ?>/<?= $ki['nama_kelas']; ?>" class="btn btn-info mt-2">Data Siswa</a>

                        <a href="<?= base_url(); ?>/kelasMapelController/index/<?= $ki['id_kelas']; ?>/<?= $ki['nama_kelas']; ?>" class="btn btn-info mt-2">Mata Pelajaran</a>

                        <a href="<?= base_url(); ?>/kelasJamPelajarancontroller/index/<?= $ki['id_kelas']; ?>/<?= $ki['nama_kelas']; ?>" class="btn btn-info mt-2">Jam Pelajaran</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($_SESSION["status"] === 'guru') : ?>
            <?php $i = 1; ?>
            <?php foreach ($kelas as $k) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k->nama_kelas; ?></td>
                    <td><?= $k->nama_guru; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>/kelasSiswaController/index/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info mt-2">Data Siswa</a>

                        <a href="<?= base_url(); ?>/kelasMapelcontroller/index/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info mt-2">Mata Pelajaran</a>

                        <a href="<?= base_url(); ?>/kelasJamPelajarancontroller/index/<?= $k->id_kelas; ?>/<?= $k->nama_kelas; ?>" class="btn btn-info mt-2">Jam Pelajaran</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>