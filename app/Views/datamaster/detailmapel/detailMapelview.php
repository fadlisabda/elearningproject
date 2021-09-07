<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<h1 class="text-center">Detail Mapel <?= $namamapel ?> Kelas <?= $namakelas ?></h1>
<h4 class="text-center">Guru : <?= $namaguru ?></h4>
<?php if ($_SESSION['status'] === 'guru') : ?>
    <a href="<?= base_url(); ?>/detailmapelcontroller/create?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary float-start">Tambah Data Detail Mapel</a>
<?php endif; ?>
<?php if ($_SESSION['status'] === 'guru') : ?>
    <a href="<?= base_url(); ?>/kelasmapelcontroller/index/<?= $idkelas ?>/<?= $namakelas ?>" class="btn btn-danger float-end">Kembali</a>
<?php endif; ?>
<?php if ($_SESSION['status'] === 'siswa') : ?>
    <a href="<?= base_url(); ?>/kelasmapelcontroller/siswa/" class="btn btn-danger float-end">Kembali</a>
<?php endif; ?>
<div class="clearfix"></div>
<br>
<?php if (isset($delete)) : ?>
    <div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus
    </div>
<?php endif; ?>
<?php if (isset($edit)) : ?>
    <div class="alert alert-success" role="alert">
        <?php if ($_SESSION['status'] === 'siswa') : ?>
            Data Berhasil Di Tambah
        <?php endif; ?>
        <?php if ($_SESSION['status'] === 'guru') : ?>
            Data Berhasil Di Edit
        <?php endif; ?>
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
            <th scope="col">TENGGAT</th>
            <th scope="col">TUGAS SISWA</th>
            <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($detailmapel as $dm) : ?>
            <tr>
                <?php if ($dm['namamapel'] === $namamapel && $dm['namakelas'] === $namakelas && $dm['namaguru'] === $namaguru) : ?>
                    <th scope="row"><?= $i++; ?></th>
                    <td>
                        <?php
                        $str = $dm['judul'];
                        echo wordwrap($str, 25, "<br>", TRUE);
                        ?>
                    </td>
                    <td>
                        <?= character_limiter($dm['keterangan'], 20); ?>
                    </td>
                    <td>
                        <?php
                        $str = explode('|', $dm['file']);
                        for ($i = 0; $i < count($str); $i++) {
                            echo '-' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= $dm['link']; ?>" target="_blank">
                            <?php
                            $str = $dm['link'];
                            echo wordwrap($str, 25, "<br>", TRUE);
                            ?>
                        </a>
                    </td>
                    <td>
                        <?= $dm['tenggat']; ?>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $sekarang = date("Y-m-d H:i:sa");
                        $exp = date($dm['tenggat']);
                        if ($dm['tenggat'] != '0000-00-00 00:00:00') {
                            if ($sekarang >= $exp && !empty($dm['tugassiswa'])) {
                                echo "<b>Diserahkan terlambat
                                    </b>";
                            } else if (empty($dm['tugassiswa'])) {
                                echo "<b>Tidak Ada
                                    </b>";
                            } else {
                                echo "<b>Diserahkan</b>";
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $str = explode('|', $dm['tugassiswa']);
                        for ($i = 0; $i < count($str); $i++) {
                            echo '-' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($_SESSION['status'] === 'guru') : ?>
                            <a href="<?= base_url(); ?>/detailmapelcontroller/edit/<?= $dm['id_detailmapel']; ?>?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-warning">Edit</a>

                            <a href="<?= base_url(); ?>/detailmapelcontroller/delete/<?= $dm['id_detailmapel']; ?>?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</a>
                        <?php endif; ?>
                        <a href="<?= base_url(); ?>/detailmapelcontroller/siswa/<?= $dm['id_detailmapel']; ?>?idkelas=<?= $idkelas ?>&namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary">Detail</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>