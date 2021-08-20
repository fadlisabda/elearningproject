<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<h1 class="text-center">Detail Mapel <?= $namamapel ?> Kelas <?= $namakelas ?></h1>
<h4 class="text-center">Guru : <?= $namaguru ?></h4>
<a href="<?= base_url(); ?>/detailmapel/create?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary float-start">Tambah Data Detail Mapel</a>
<a href="<?= base_url(); ?>/kelasMapel/index/<?= $idkelas ?>/<?= $namakelas ?>" class="btn btn-danger float-end">Kembali</a>
<div class="clearfix"></div>
<br>
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
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">JUDUL</th>
            <th scope="col">KETERANGAN</th>
            <th scope="col">FILE</th>
            <th scope="col">LINK</th>
            <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($detailmapel as $dm) : ?>
            <tr>
                <?php if ($dm['namamapel'] === $namamapel && $dm['namakelas'] === $namakelas && $dm['namaguru'] === $namaguru) : ?>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $dm['judul']; ?></td>
                    <td>
                        <?php
                        $str = $dm['keterangan'];
                        echo wordwrap($str, 125, "<br>", TRUE);
                        ?>
                    </td>
                    <td>
                        <a href="<?= base_url() ?>/public/file/<?= $dm['file']; ?>" target="_blank">
                            <button type="button" class="btn btn-primary">
                                <?= $dm['file']; ?>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="<?= $dm['link']; ?>" target="_blank">
                            <button type="button" class="btn btn-primary">
                                <?= $dm['link']; ?>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>/detailmapel/edit/<?= $dm['id_detailmapel']; ?>?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url(); ?>/detailmapel/delete/<?= $dm['id_detailmapel']; ?>?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>