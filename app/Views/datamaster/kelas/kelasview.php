<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/kelas/create?page_kelas=<?= (empty($_GET['page_kelas'])) ? 1 : $_GET['page_kelas'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data Kelas</a>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Nama Kelas" name="keyword" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
        </div>
    </form>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
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
                <?php $j = 0; ?>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($kelas as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['nama_kelas']; ?></td>
                        <td><?= $namaguru[$j++]->nama_guru; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/kelas/edit/<?= $k['id_kelas']; ?>?page_kelas=<?= (empty($_GET['page_kelas'])) ? 1 : $_GET['page_kelas'] ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/kelas/delete/<?= $k['id_kelas']; ?>?page_kelas=<?= (empty($_GET['page_kelas'])) ? 1 : $_GET['page_kelas'] ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                            <br>

                            <a href="<?= base_url(); ?>/kelassiswa/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas']; ?>" class="btn btn-info m-1">Data Siswa</a>

                            <a href="<?= base_url(); ?>/kelasmapel/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas']; ?>" class="btn btn-info m-1">Mata Pelajaran</a>

                            <a href="<?= base_url(); ?>/kelasjampelajaran/<?= $k['id_kelas']; ?>/<?= $k['nama_kelas']; ?>" class="btn btn-info m-1">Jam Pelajaran</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('kelas', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>