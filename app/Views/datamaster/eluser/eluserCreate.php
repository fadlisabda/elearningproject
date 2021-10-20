<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col">
            <h2>Tambah Data ElUser</h2>
            <form action="<?= base_url(); ?>/eluser/save?page_el_user=<?= $_GET['page_el_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" required value="<?= old('username'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class=" mb-3">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" required value="<?= old('status'); ?>">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url(); ?>/eluser?page_el_user=<?= $_GET['page_el_user']; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>