<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/guru/create?page_data_guru=<?= (empty($_GET['page_data_guru'])) ? 1 : $_GET['page_data_guru'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data Guru</a>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="cari nip atau nama guru" name="keyword" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
        </div>
    </form>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <?php endif; ?>
    <table class="table">
        <div class="table-responsive">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIP</th>
                    <th scope="col">NAMA GURU</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">NO TELP</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">FOTO GURU</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($guru as $g) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $g['nip'] ?></td>
                        <td>
                            <?php
                            $str = $g['nama_guru'];
                            echo wordwrap($str, 20, "<br>", TRUE);
                            ?>
                        </td>
                        <td>
                            <?php
                            $str = $g['tempat_lahir'];
                            echo wordwrap($str, 20, "<br>", TRUE);
                            ?>
                        </td>
                        <td><?= $g['tgl_lahir'] ?></td>
                        <td><?= $g['no_telp'] ?></td>
                        <td>
                            <?php
                            $str = $g['alamat'];
                            echo wordwrap($str, 20, "<br>", TRUE);
                            ?>
                        </td>
                        <td>
                            <img src="<?= base_url(); ?>/public/file/<?= $g['foto_guru'] ?>" width="110">
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>/guru/edit/<?= $g['id_guru']; ?>?page_data_guru=<?= (empty($_GET['page_data_guru'])) ? 1 : $_GET['page_data_guru'] ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/guru/delete/<?= $g['id_guru']; ?>?page_data_guru=<?= (empty($_GET['page_data_guru'])) ? 1 : $_GET['page_data_guru'] ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    <?= $pager->links('data_guru', 'paginationview'); ?>
</div>
</div>
<?= $this->endSection(); ?>