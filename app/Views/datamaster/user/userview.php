<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/user/create?page_user=<?= (empty($_GET['page_user'])) ? 1 : $_GET['page_user'] ?>" class="btn btn-primary mt-3 mb-3">Tambah Data User</a>
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
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $u['username'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/user/edit/<?= $u['id_user']; ?>?page_user=<?= (empty($_GET['page_user'])) ? 1 : $_GET['page_user'] ?>" class="btn btn-warning">Edit</a>

                            <a href="<?= base_url(); ?>/user/delete/<?= $u['id_user']; ?>?page_user=<?= (empty($_GET['page_user'])) ? 1 : $_GET['page_user'] ?>" class="btn btn-danger hapusdata">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('user', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>