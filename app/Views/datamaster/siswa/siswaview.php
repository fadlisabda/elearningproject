<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/siswa/create?page_siswa=<?= (empty($_GET['page_siswa'])) ? 1 : $_GET['page_siswa'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data Siswa</a>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="cari nis dan nama siswa" name="keyword" autocomplete="off">
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
                    <th scope="col">NIS</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NAMA SISWA</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">NOMOR TELEPON</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">FOTO SISWA</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($siswa as $s) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $s['nis'] ?></td>
                        <td><?= $s['nisn'] ?></td>
                        <td>
                            <?php
                            $str = $s['nama_siswa'];
                            echo wordwrap($str, 20, "<br>", TRUE);
                            ?>
                        </td>
                        <td>
                            <?php
                            $str = $s['tempat_lahir'];
                            echo wordwrap($str, 20, "<br>", TRUE);
                            ?>
                        </td>
                        <td><?= $s['tanggal_lahir'] ?></td>
                        <td><?= $s['no_telp'] ?></td>
                        <td>
                            <?php
                            $str = $s['alamat'];
                            echo wordwrap($str, 20, "<br>", TRUE);
                            ?>
                        </td>
                        <td><?= $s['jenis_kelamin'] ?></td>
                        <td>
                            <img src="<?= base_url(); ?>/public/file/<?= $s['foto_siswa'] ?>" width="110">
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>/siswa/edit/<?= $s['id_siswa']; ?>?page_siswa=<?= (empty($_GET['page_siswa'])) ? 1 : $_GET['page_siswa'] ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/siswa/delete/<?= $s['id_siswa']; ?>?page_siswa=<?= (empty($_GET['page_siswa'])) ? 1 : $_GET['page_siswa'] ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('siswa', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>