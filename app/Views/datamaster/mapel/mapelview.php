<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/mapel/create?page_data_mata_pelajaran=<?= (empty($_GET['page_data_mata_pelajaran'])) ? 1 : $_GET['page_data_mata_pelajaran'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data Mapel</a>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="cari mata pelajaran" name="keyword" autocomplete="off">
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
                    <th scope="col">NAMA MATA PELAJARAN</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($mapel as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $m['nama_mapel'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/mapel/edit/<?= $m['id_mapel']; ?>?page_data_mata_pelajaran=<?= (empty($_GET['page_data_mata_pelajaran'])) ? 1 : $_GET['page_data_mata_pelajaran'] ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/mapel/delete/<?= $m['id_mapel']; ?>?page_data_mata_pelajaran=<?= (empty($_GET['page_data_mata_pelajaran'])) ? 1 : $_GET['page_data_mata_pelajaran'] ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('data_mata_pelajaran', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>