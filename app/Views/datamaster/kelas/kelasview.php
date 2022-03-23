<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <a href="<?= base_url(); ?>/kelas/create?page_kelas=<?= (empty($_GET['page_kelas'])) ? 1 : $_GET['page_kelas'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data Kelas</a>
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Nama Kelas" name="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <br>
    <?php if ($_SESSION["status"] === 'guru') : ?>
        <a href="<?= base_url(); ?>/kelasmapel" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION["status"] === 'siswa') : ?>
        <a href="<?= base_url(); ?>/kelasmapel/siswa" class="btn btn-danger">Kembali</a>
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
                    <th scope="col">NAMA KELAS</th>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">NIP WALI KELAS</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                        <th scope="col">NAMA WALI KELAS</th>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="col">ACTIONS</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $j = 0 + (1 * ($currentPage - 1)); ?>
                <?php $i = 1 + (1 * ($currentPage - 1)); ?>
                <?php foreach ($kelas as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kelas']; ?></td>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td><?= $k['nip']; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'guru' || $_SESSION["status"] === 'siswa') : ?>
                            <td><?= $namaguru[$j++]->nama_guru; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION["status"] === 'admin') : ?>
                            <td>
                                <a href="<?= base_url(); ?>/kelas/edit/<?= $k['id_kelas']; ?>?page_kelas=<?= (empty($_GET['page_kelas'])) ? 1 : $_GET['page_kelas'] ?>" class="btn btn-warning m-1">Edit</a>

                                <a href="<?= base_url(); ?>/kelas/delete/<?= $k['id_kelas']; ?>?page_kelas=<?= (empty($_GET['page_kelas'])) ? 1 : $_GET['page_kelas'] ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                                <br>

                                <a href="<?= base_url(); ?>/kelassiswa/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas']; ?>" class="btn btn-info m-1">Data Siswa</a>

                                <a href="<?= base_url(); ?>/kelasmapel/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas']; ?>" class="btn btn-info m-1">Mata Pelajaran</a>

                                <a href="<?= base_url(); ?>/kelasjampelajaran/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas']; ?>" class="btn btn-info m-1">Jam Pelajaran</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('kelas', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>