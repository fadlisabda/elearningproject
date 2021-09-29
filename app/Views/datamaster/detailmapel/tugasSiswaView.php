<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/detailmapel/<?= $detailmapel->getResult()[0]->namamapel; ?>/<?= $detailmapel->getResult()[0]->namakelas; ?>/<?= $detailmapel->getResult()[0]->namaguru; ?>" class="btn btn-warning mt-2 mb-2">Kembali</a>
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
                <?php $i = 1; ?>
                <?php foreach ($tugassiswa as $t) : ?>
                    <?php if ($t['namamapel'] === $namamapel && $t['namakelas'] === $namakelas && $t['namaguru'] === $namaguru && $t['id_detailmapel'] === $id) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['nis'] ?></td>
                            <td>
                                <?php
                                $str = explode('|', $t['filetugas']);
                                for ($i = 0; $i < count($str); $i++) {
                                    echo '-' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $str = explode(' ', $t['linktugas']);
                                for ($j = 0; $j < count($str); $j++) {
                                    echo '-' . '<a href=' .  $str[$j]  . ' target=_blank>' . wordwrap($str[$j], 25, "<br>", TRUE) . '</a><br>';
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
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>