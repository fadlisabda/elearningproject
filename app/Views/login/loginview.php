<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/home");
    exit;
}
?>
<div class="container d-flex justify-content-center" style="margin-top: 10%;">
    <div class="row">
        <div class="col">
            <h1>ELEARNING - Login</h1>
            <?php if (session()->getFlashdata('error')) : ?>
                <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
            <?php endif; ?>

            <form action="<?= base_url() ?>/login/save" method="post">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>