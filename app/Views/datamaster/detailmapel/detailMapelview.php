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
<div class="container">
    <a href="<?= base_url(); ?>/detailmapelcontroller/create?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary float-left">Tambah Data Detail Mapel</a>

    <?php if ($_SESSION['status'] === 'guru') : ?>
        <a href="<?= base_url(); ?>/kelasmapelcontroller/index/" class="btn btn-danger float-right">Kembali</a>
    <?php endif; ?>
    <?php if ($_SESSION['status'] === 'siswa') : ?>
        <a href="<?= base_url(); ?>/kelasmapelcontroller/siswa/" class="btn btn-danger float-right">Kembali</a>
    <?php endif; ?>
    <div class="clearfix"></div>
    <br>
    <?php if (isset($edit) || isset($tambah)) : ?>
        <div class="flash-data" data-flashdata="<?= (isset($edit)) ? 'Diedit' : 'Ditambah' ?>"></div>
    <?php endif; ?>
    <?php if (isset($delete)) : ?>
        <div class="flash-data" data-flashdata="Dihapus"></div>
    <?php endif; ?>
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
                                echo '-' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (!empty($dm->link)) {
                                $str = explode(' ', $dm->link);
                                for ($j = 0; $j < count($str); $j++) {
                                    echo '-' . '<a href=' . $str[$j] . ' target=_blank>' . wordwrap($str[$j], 25, "<br>", TRUE) . '</a><br>';
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
                            <?php if ($_SESSION['status'] === 'guru') : ?>
                                <a href="<?= base_url(); ?>/detailmapelcontroller/edit/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-warning">Edit</a>

                                <a href="<?= base_url(); ?>/detailmapelcontroller/delete/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-danger hapusdata">Delete</a>

                                <a href="<?= base_url(); ?>/detailmapelcontroller/tugassiswa/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-info">Tugas Siswa</a>
                            <?php endif; ?>
                            <a href="<?= base_url(); ?>/detailmapelcontroller/siswa/<?= $dm->id_detailmapel; ?>?namamapel=<?= $namamapel ?>&namakelas=<?= $namakelas ?>&namaguru=<?= $namaguru ?>" class="btn btn-primary">Detail</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>