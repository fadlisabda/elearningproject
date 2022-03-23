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
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <a href="<?= base_url(); ?>/kelasjampelajaran/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_jam_pelajaran=<?= (empty($_GET['page_kelas_jam_pelajaran'])) ? 1 : $_GET['page_kelas_jam_pelajaran'] ?>" class="btn btn-primary float-right">Tambah Data Jam Pelajaran</a>
        <a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION["status"] === 'guru') : ?>
        <a href="<?= base_url(); ?>/kelasmapel" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION["status"] === 'siswa') : ?>
        <a href="<?= base_url(); ?>/kelasmapel/siswa" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <br>
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <form action="" method="post">
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Cari Hari Atau Jam" name="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <br>
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">ID MAPEL</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                        <th scope="col">NAMA MATA PELAJARAN</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">ID KELAS</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                        <th scope="col">NAMA KELAS</th>
                    <?php endif; ?>
                    <th scope="col">HARI</th>
                    <th scope="col">JAM</th>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">ACTIONS</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $j = 0 + (5 * ($currentPage - 1)); ?>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($kelasjampelajaran as $kjp) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td><?= $kjp['id_mapel']; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                            <td><?= $mapelkelas[$j]->nama_mapel; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td><?= $kjp['id_kelas']; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                            <td><?= $mapelkelas[$j]->nama_kelas; ?></td>
                        <?php endif; ?>
                        <td><?= $kjp['hari']; ?></td>
                        <td><?= $kjp['jam']; ?></td>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td>
                                <a href="<?= base_url(); ?>/kelasjampelajaran/edit/<?= $kjp['id_jadwal']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_jam_pelajaran=<?= (empty($_GET['page_kelas_jam_pelajaran'])) ? 1 : $_GET['page_kelas_jam_pelajaran'] ?>" class="btn btn-warning">Edit</a>

                                <a href="<?= base_url(); ?>/kelasjampelajaran/delete/<?= $kjp['id_jadwal']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_jam_pelajaran=<?= (empty($_GET['page_kelas_jam_pelajaran'])) ? 1 : $_GET['page_kelas_jam_pelajaran'] ?>" class="btn btn-danger hapusdata">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php $j++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('kelas_jam_pelajaran', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>