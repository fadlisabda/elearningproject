<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<?php if ($_SESSION['status'] == 'guru') : ?>
    <h1 class="text-center">Data Mapel & Kelas <?= $kelasmapel[0]->nama_guru; ?></h1>
<?php endif; ?>
<?php if ($_SESSION['status'] == 'admin') : ?>
    <h1 class="text-center">Data Mapel Kelas <?= $namakelas; ?></h1>
<?php endif; ?>
<div class="container">
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <a href="<?= base_url(); ?>/kelasmapel/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-primary float-right">Tambah Data Kelas Mapel</a>
        <a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
    <?php endif; ?>
    <br><br>
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <?php if (isset($edit) || isset($tambah)) : ?>
            <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
        <?php endif; ?>
        <?php if (isset($delete)) : ?>
            <div class="flash-data" data-flashdata="Dihapus"></div>
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
                                <a href="<?= base_url(); ?>/kelasmapel/edit/<?= $kmi['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-warning">Edit</a>

                                <a href="<?= base_url(); ?>/kelasmapel/delete/<?= $kmi['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-danger hapusdata">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if ($_SESSION["status"] === 'guru') : ?>
        <div class="row row-cols-1 row-cols-md-3">
            <?php $i = 1; ?>
            <?php foreach ($kelasmapel as $km) : ?>
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header"><?= $km->nama_mapel; ?> <?= $km->nama_kelas; ?></div>
                        <div class="card-body">
                            <p class="card-text"><?= $km->nama_guru; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url(); ?>/detailmapel/<?= $km->nama_mapel; ?>/<?= $km->nama_kelas; ?>/<?= $km->nama_guru; ?>" class="btn btn-info">Detail Mapel</a>

                            <a href="<?= base_url(); ?>/kelassiswa/<?= $km->kelas_mapelid_kelas; ?>/<?= $km->nama_kelas; ?>" class="btn btn-info">Data Siswa</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <?= $this->endSection(); ?>