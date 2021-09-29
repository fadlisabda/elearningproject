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
            <h2>Ubah Data User</h2>
            <form action="<?= base_url(); ?>/user/update/<?= $user['id_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_user">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user['nama_user']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="level_user">Level Akses</label>
                    <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $user['level_user']; ?>" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" <?= ($user['status_user'] == "1") ? "checked" : "" ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0" <?= ($user['status_user'] == "0") ? "checked" : "" ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Non Aktif
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>/user" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>