<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Jam Pelajaran Kelas <?= $namakelas ?></h1>
<div class="container">
    <a href="<?= base_url(); ?>/kelasjampelajaran/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_jam_pelajaran=<?= (empty($_GET['page_kelas_jam_pelajaran'])) ? 1 : $_GET['page_kelas_jam_pelajaran'] ?>" class="btn btn-primary float-right">Tambah Data Jam Pelajaran</a>
    <a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
    <form action="" method="post">
        <div class="input-group mt-3">
            <input type="text" class="form-control" placeholder="Cari Hari Atau Jam" name="keyword" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
        </div>
    </form>
    <br>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID MAPEL</th>
                <th scope="col">NAMA MATA PELAJARAN</th>
                <th scope="col">ID KELAS</th>
                <th scope="col">NAMA KELAS</th>
                <th scope="col">HARI</th>
                <th scope="col">JAM</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php $j = 0 + (5 * ($currentPage - 1)); ?>
            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
            <?php foreach ($kelasjampelajaran as $kjp) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $kjp['id_mapel']; ?></td>
                    <td><?= $mapelkelas[$j]->nama_mapel; ?></td>
                    <td><?= $kjp['id_kelas']; ?></td>
                    <td><?= $mapelkelas[$j]->nama_kelas; ?></td>
                    <td><?= $kjp['hari']; ?></td>
                    <td><?= $kjp['jam']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>/kelasjampelajaran/edit/<?= $kjp['id_jadwal']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_jam_pelajaran=<?= (empty($_GET['page_kelas_jam_pelajaran'])) ? 1 : $_GET['page_kelas_jam_pelajaran'] ?>" class="btn btn-warning">Edit</a>

                        <a href="<?= base_url(); ?>/kelasjampelajaran/delete/<?= $kjp['id_jadwal']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_jam_pelajaran=<?= (empty($_GET['page_kelas_jam_pelajaran'])) ? 1 : $_GET['page_kelas_jam_pelajaran'] ?>" class="btn btn-danger hapusdata">Delete</a>
                    </td>
                </tr>
                <?php $j++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('kelas_jam_pelajaran', 'paginationview'); ?>
</div>
<?= $this->endSection(); ?>