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
        <a href="<?= base_url(); ?>/kelasmapel/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_mapel=<?= (empty($_GET['page_kelas_mapel'])) ? 1 : $_GET['page_kelas_mapel'] ?>" class="btn btn-primary float-right">Tambah Data Kelas Mapel</a>

        <a href="<?= base_url(); ?>/kelas" class="btn btn-danger">Kembali</a>
        <form action="" method="post">
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Cari Nip" name="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <br>
    <?php if ($_SESSION["status"] === 'admin') : ?>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($_SESSION["status"] === 'admin') : ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">ID MAPEL</th>
                        <th scope="col">NAMA MATA PELAJARAN</th>
                        <th scope="col">ID KELAS</th>
                        <th scope="col">NAMA KELAS</th>
                        <th scope="col">NIP</th>
                        <th scope="col">NAMA GURU</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $j = 0 + (5 * ($currentPage - 1)); ?>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($kelasMapelInsert as $kmi) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $kmi['id_mapel']; ?></td>
                            <td><?= $mapelkelasguru[$j]->nama_mapel; ?></td>
                            <td><?= $kmi['id_kelas']; ?></td>
                            <td><?= $mapelkelasguru[$j]->nama_kelas; ?></td>
                            <td><?= $kmi['nip']; ?></td>
                            <td><?= $mapelkelasguru[$j]->nama_guru; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>/kelasmapel/edit/<?= $kmi['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_mapel=<?= (empty($_GET['page_kelas_mapel'])) ? 1 : $_GET['page_kelas_mapel'] ?>" class="btn btn-warning">Edit</a>

                                <a href="<?= base_url(); ?>/kelasmapel/delete/<?= $kmi['id_kelas_mapel']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>&page_kelas_mapel=<?= (empty($_GET['page_kelas_mapel'])) ? 1 : $_GET['page_kelas_mapel'] ?>" class="btn btn-danger hapusdata">Delete</a>
                            </td>
                        </tr>
                        <?php $j++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('kelas_mapel', 'paginationview'); ?>
        </div>
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