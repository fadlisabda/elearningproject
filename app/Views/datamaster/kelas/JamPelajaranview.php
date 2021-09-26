<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<h1 class="text-center">Data Jam Pelajaran Kelas <?= $namakelas ?></h1>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <a href="<?= base_url(); ?>/kelasjampelajarancontroller/create?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-primary float-right">Tambah Data Jam Pelajaran</a>
<?php endif; ?>
<a href="<?= base_url(); ?>/kelascontroller" class="btn btn-danger">Kembali</a>
<br><br>
<?php if ($_SESSION["status"] === 'admin') : ?>
    <?php if (isset($edit) || isset($tambah)) : ?>
        <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
    <?php endif; ?>
    <?php if (isset($delete)) : ?>
        <div class="flash-data" data-flashdata="Dihapus"></div>
    <?php endif; ?>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <?php if ($_SESSION["status"] === 'admin') : ?>
                <th scope="col">ID MAPEL</th>
                <th scope="col">ID KELAS</th>
                <th scope="col">HARI</th>
                <th scope="col">JAM</th>
                <th scope="col">ACTIONS</th>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === 'guru') : ?>
                <th scope="col">NAMA MATA PELAJARAN</th>
                <th scope="col">HARI</th>
                <th scope="col">JAM</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if ($_SESSION["status"] === 'admin') : ?>
            <?php $i = 1; ?>
            <?php foreach ($kelasJamPelajaranInsert as $kjpi) : ?>
                <tr>
                    <?php if ($id === $kjpi['id_kelas']) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $kjpi['id_mapel']; ?></td>
                        <td><?= $kjpi['id_kelas']; ?></td>
                        <td><?= $kjpi['hari']; ?></td>
                        <td><?= $kjpi['jam']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/kelasjampelajarancontroller/edit/<?= $kjpi['id_jadwal']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-warning">Edit</a>

                            <a href="<?= base_url(); ?>/kelasjampelajarancontroller/delete/<?= $kjpi['id_jadwal']; ?>?id=<?= $id; ?>&namakelas=<?= $namakelas; ?>" class="btn btn-danger hapusdata">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($_SESSION["status"] === 'guru') : ?>
            <?php $i = 1; ?>
            <?php foreach ($kelasjampelajaran as $kjp) : ?>
                <tr>
                    <?php if ($id === $kjp->id_kelas) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $kjp->nama_mapel; ?></td>
                        <td><?= $kjp->hari; ?></td>
                        <td><?= $kjp->jam; ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>

<?= $this->endSection(); ?>