<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Kelas Siswa <?= $namakelas ?></h1>
<div class="container">
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <a href="<?= base_url(); ?>/kelassiswa/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_siswa=<?= (empty($_GET['page_kelas_siswa'])) ? 1 : $_GET['page_kelas_siswa'] ?>" class="btn btn-primary float-right">Tambah Data Kelas Siswa</a>

        <a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION["status"] === 'guru') : ?>
        <a href="<?= base_url(); ?>/kelasmapel" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION["status"] === 'siswa') : ?>
        <a href="<?= base_url(); ?>/kelasmapel/siswa" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <form action="" method="post">
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Cari Nis" name="keyword" autocomplete="off">
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
                    <th scope="col">NIS</th>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">ID KELAS</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                        <th scope="col">NAMA SISWA</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">ACTIONS</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $j = 0 + (1 * ($currentPage - 1)); ?>
                <?php $i = 1 + (1 * ($currentPage - 1)); ?>
                <?php foreach ($kelassiswa as $ks) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ks['nis']; ?></td>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td><?= $ks['id_kelas']; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                            <td>
                                <?= $namasiswa[$j++]->nama_siswa; ?>
                            </td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td>
                                <a href="<?= base_url(); ?>/kelassiswa/edit/<?= $ks['id_kelas_siswa']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_siswa=<?= (empty($_GET['page_kelas_siswa'])) ? 1 : $_GET['page_kelas_siswa'] ?>" class="btn btn-warning">Edit</a>

                                <a href="<?= base_url(); ?>/kelassiswa/delete/<?= $ks['id_kelas_siswa']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_siswa=<?= (empty($_GET['page_kelas_siswa'])) ? 1 : $_GET['page_kelas_siswa'] ?>" class="btn btn-danger hapusdata">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('kelas_siswa', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>