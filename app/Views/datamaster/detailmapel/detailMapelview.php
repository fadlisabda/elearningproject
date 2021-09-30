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
<div class="container">
    <a href="<?= base_url(); ?>/detailmapel/create?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary float-left">Tambah Data Detail Mapel</a>

    <?php if ($_SESSION['status'] === 'guru') : ?>
        <a href="<?= base_url(); ?>/kelasmapel" class="btn btn-danger float-right">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION['status'] === 'siswa') : ?>
        <a href="<?= base_url(); ?>/kelasmapel/siswa" class="btn btn-danger float-right">Kembali</a>
    <?php endif; ?>
    <div class="clearfix"></div>
    <br>
    <?php if (isset($edit) || isset($tambah)) : ?>
        <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
    <?php endif; ?>
    <?php if (isset($delete)) : ?>
        <div class="flash-data" data-flashdata="Dihapus"></div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">USERNAME</th>
                    <th scope="col">JUDUL</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">FILE</th>
                    <th scope="col">LINK</th>
                    <th scope="col">TENGGAT</th>
                    <th scope="col">TIPE</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailmapel->getResult() as $dm) : ?>
                    <tr>
                        <?php if ($dm->namamapel === $namamapel && $dm->namakelas === $namakelas && $dm->namaguru === $namaguru) : ?>
                            <?php if ($dm->status == 'siswa') : ?>
                                <td>
                                    <?= $dm->username; ?>
                                </td>
                            <?php endif; ?>
                            <?php if ($dm->status == 'guru') : ?>
                                <td>
                                    <?= $dm->status; ?>
                                </td>
                            <?php endif; ?>
                            <td>
                                <?php
                                $str = $dm->judul;
                                echo wordwrap($str, 25, "<br>", TRUE);
                                ?>
                            </td>
                            <td>
                                <?= character_limiter($dm->keterangan, 20); ?>
                            </td>
                            <td>
                                <?php
                                $str = explode('|', $dm->file);
                                for ($i = 0; $i < count($str); $i++) {
                                    if (!empty($dm->file)) {
                                        echo '<i class="bi bi-cursor btn-outline-info"></i>' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($dm->link)) {
                                    $str = explode(' ', $dm->link);
                                    for ($j = 0; $j < count($str); $j++) {
                                        if (!empty($dm->link)) {
                                            echo '<i class="bi bi-cursor btn-outline-info"></i>' . '<a href=' . $str[$j] . ' target=_blank>' . wordwrap($str[$j], 25, "<br>", TRUE) . '</a><br>';
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?= $dm->tenggat; ?>
                            </td>
                            <td>
                                <?= $dm->tipe; ?>
                            </td>
                            <td>
                                <?php if ($_SESSION['status'] == 'guru') : ?>
                                    <a href="<?= base_url(); ?>/detailmapel/edit/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-warning m-1">Edit</a>

                                    <a href="<?= base_url(); ?>/detailmapel/delete/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-danger hapusdata m-1">Delete</a>

                                    <a href="<?= base_url(); ?>/detailmapel/tugassiswa/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-info m-1">Tugas Siswa</a>
                                <?php endif; ?>

                                <?php if ($dm->status == 'siswa' && $_SESSION['status'] == 'siswa') : ?>
                                    <a href="<?= base_url(); ?>/detailmapel/edit/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-warning m-1">Edit</a>

                                    <a href="<?= base_url(); ?>/detailmapel/delete/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-danger hapusdata m-1">Delete</a>
                                <?php endif; ?>

                                <a href="<?= base_url(); ?>/detailmapel/siswa/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary m-1">Detail</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>