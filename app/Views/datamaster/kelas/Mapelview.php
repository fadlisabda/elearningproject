<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<h1 class="text-center">Data Mapel Kelas <?= $namakelas; ?></h1>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <a href="<?= base_url(); ?>/kelasmapelcontroller/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-primary float-end">Tambah Data Kelas Mapel</a>
<?php endif; ?>
<a href="<?= base_url(); ?>/kelascontroller" class="btn btn-danger">Kembali</a>
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

<?php if ($_SESSION["status"] === 'admin') : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID MAPEL</th>
                <th scope="col">ID KELAS</th>
                <th scope="col">NIP</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kelasMapelInsert as $kmi) : ?>
                <tr>
                    <?php if ($id === $kmi['id_kelas']) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $kmi['id_mapel']; ?></td>
                        <td><?= $kmi['id_kelas']; ?></td>
                        <td><?= $kmi['nip']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/kelasmapelcontroller/edit/<?= $kmi['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-warning">Edit</a>

                            <a href="<?= base_url(); ?>/kelasmapelcontroller/delete/<?= $kmi['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if ($_SESSION["status"] === 'guru') : ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $i = 1; ?>
        <?php foreach ($kelasmapel as $km) : ?>
            <?php if ($id === $km->id_kelas) : ?>
                <div class="col">
                    <div class="card">
                        <div class="card-header"><?= $km->nama_mapel; ?></div>
                        <div class="card-body">
                            <p class="card-text"><?= $km->nama_guru; ?></p>
                        </div>
                        <div class="card-footer"><a href="<?= base_url(); ?>/DetailMapelcontroller/index/<?= $km->id_kelas; ?>/<?= $km->nama_mapel; ?>/<?= $namakelas; ?>/<?= $km->nama_guru; ?>" class="btn btn-info">Detail Mapel</a></div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?= $this->endSection(); ?>