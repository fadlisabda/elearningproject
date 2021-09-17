<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<h1 class="text-center">Data Kelas Siswa <?= $namakelas ?></h1>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <a href="<?= base_url(); ?>/kelassiswacontroller/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-primary float-right">Tambah Data Kelas Siswa</a>
<?php endif; ?>
<a href="<?= base_url(); ?>/kelascontroller" class="btn btn-danger">Kembali</a>
<br><br>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <?php if (isset($edit)||isset($tambah)) : ?>
        <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
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
        <?php if ($_SESSION["status"] === 'admin') : ?>
            <?php $i = 1; ?>
            <?php foreach ($kelasSiswaInsert as $ksi) : ?>
                <tr>
                    <?php if ($id === $ksi['id_kelas']) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ksi['nis']; ?></td>
                        <td><?= $ksi['id_kelas']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/kelassiswacontroller/edit/<?= $ksi['id_kelas_siswa']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-warning">Edit</a>

                            <a href="<?= base_url(); ?>/kelassiswacontroller/delete/<?= $ksi['id_kelas_siswa']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-danger hapusdata">Delete</a>

                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($_SESSION["status"] === 'guru') : ?>
            <?php $i = 1; ?>
            <?php foreach ($kelassiswa as $ks) : ?>
                <tr>
                    <?php if ($id === $ks->id_kelas) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ks->kelas_siswanis; ?></td>
                        <td><?= $ks->nama_siswa; ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>