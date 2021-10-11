<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <br>
    <a href="<?= base_url(); ?>/detailmapel/<?= $detailmapel->getResult()[0]->namamapel; ?>/<?= $detailmapel->getResult()[0]->namakelas; ?>/<?= $detailmapel->getResult()[0]->namaguru; ?>" class="btn btn-warning mt-2 mb-2">Kembali</a>
    <form action="" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="cari nis" name="keyword" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
        </div>
    </form><br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIS</th>
                    <th scope="col">FILE TUGAS</th>
                    <th scope="col">LINK</th>
                    <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($tugassiswa as $t) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $t['nis'] ?></td>
                        <td>
                            <?php
                            $str = explode('|', $t['filetugas']);
                            for ($i = 0; $i < count($str); $i++) {
                                if (!empty($t['filetugas'])) {
                                    echo '<i class="bi bi-cursor btn-outline-info"></i>' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $str = explode(' ', $t['linktugas']);
                            for ($j = 0; $j < count($str); $j++) {
                                if (!empty($t['linktugas'])) {
                                    echo '<i class="bi bi-cursor btn-outline-info"></i>' . '<a href=' .  $str[$j]  . ' target=_blank>' . wordwrap($str[$j], 25, "<br>", TRUE) . '</a><br>';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $sekarang = date("Y-m-d H:i:sa");
                            $exp = date($detailmapel->getResult()[0]->tenggat);
                            if ($detailmapel->getResult()[0]->tenggat != '0000-00-00 00:00:00') {
                                if ($sekarang >= $exp && !empty($t['filetugas'])) {
                                    echo "<b>Diserahkan terlambat
                                    </b>";
                                } else {
                                    echo "<b>Diserahkan</b>";
                                }
                            } elseif ($detailmapel->getResult()[0]->tenggat === '0000-00-00 00:00:00' && !empty($t['filetugas'])) {
                                echo "<b>Diserahkan</b>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('el_tugas_siswa', 'paginationview'); ?>
    </div>
</div>
<?= $this->endSection(); ?>