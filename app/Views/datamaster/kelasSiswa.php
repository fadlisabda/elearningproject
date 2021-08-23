<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Data Kelas Siswa <?= $namakelas ?></h1>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <a href="<?= base_url(); ?>/kelassiswa/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-primary float-end">Tambah Data Kelas Siswa</a>
<?php endif; ?>
<a href="<?= base_url(); ?>/kelas" class="btn btn-danger float">Kembali</a>
<br><br>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <?php if (isset($delete)) : ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil Di Hapus
        </div>
    <?php endif; ?>
    <?php if (isset($edit)) : ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil Di Edit
        </div>
    <?php endif; ?>
    <?php if (isset($tambah)) : ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil Di Tambah
        </div>
    <?php endif; ?>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIS</th>
            <?php if ($_SESSION["status"] === 'guru') : ?>
                <th scope="col">NAMA SISWA</th>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === 'admin') : ?>
                <th scope="col">ID KELAS</th>
                <th scope="col">ACTIONS</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kelassiswa as $ks) : ?>
            <tr>
                <?php if ($id === $ks->id_kelas) : ?>
                    <?php if ($_SESSION["status"] === 'guru') : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ks->kelas_siswanis; ?></td>
                        <td><?= $ks->nama_siswa; ?></td>
                    <?php endif; ?>
                    <?php if ($_SESSION["status"] === 'admin') : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ks->kelas_siswanis; ?></td>
                        <td><?= $ks->id_kelas; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/kelassiswa/edit/<?= $ks->id_kelas_siswa; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url(); ?>/kelassiswa/delete/<?= $ks->id_kelas_siswa; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                        </td>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>