<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/eluser/create?page_el_user=<?= (empty($_GET['page_el_user'])) ? 1 : $_GET['page_el_user'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data ElUser</a>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="cari username" name="keyword" autocomplete="off">
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
                    <th scope="col">USERNAME</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($eluser as $eu) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $eu['username'] ?></td>
                        <td><?= $eu['status'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/eluser/edit/<?= $eu['id_eluser']; ?>?page_el_user=<?= (empty($_GET['page_el_user'])) ? 1 : $_GET['page_el_user'] ?>" class="btn btn-warning m-1">Edit</a>

                            <a href="<?= base_url(); ?>/eluser/delete/<?= $eu['id_eluser']; ?>?page_el_user=<?= (empty($_GET['page_el_user'])) ? 1 : $_GET['page_el_user'] ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('el_user', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>