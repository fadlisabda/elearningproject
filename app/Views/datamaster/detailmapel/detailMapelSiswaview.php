<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title float-right">Tenggat : <?= $detailmapel->getResult()[0]->tenggat; ?></h5>

                    <h5 class="card-title"><?= $detailmapel->getResult()[0]->judul; ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted"><?= $detailmapel->getResult()[0]->namaguru; ?></h6>

                    <p class="card-text"><?= $detailmapel->getResult()[0]->keterangan; ?></p>

                    <a href="<?= base_url(); ?>/detailmapelcontroller/index/<?= $_GET['idkelas']; ?>/<?= $detailmapel->getResult()[0]->namamapel; ?>/<?= $detailmapel->getResult()[0]->namakelas; ?>/<?= $detailmapel->getResult()[0]->namaguru; ?>" class="btn btn-warning mt-2">Kembali</a>
                </div>
            </div>
        </div>
        <?php if ($_SESSION['status'] === 'siswa') : ?>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tugas Anda</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php foreach ($tugassiswa as $ts) : ?>
                                <?php if ($ts['nis'] == $_SESSION['username'] && $ts['id_detailmapel'] == $id) : ?>
                                    <?php if ($detailmapel->getResult()[0]->tenggat === '0000-00-00 00:00:00' && !empty($ts['filetugas'])) : ?>
                                        <?php
                                        echo "<b>Diserahkan</b>";
                                        ?>
                                    <?php elseif ($detailmapel->getResult()[0]->tenggat === '0000-00-00 00:00:00' && !empty($ts['linktugas'])) : ?>
                                        <?php
                                        echo "<b>Diserahkan</b>";
                                        ?>
                                    <?php elseif (!empty($ts['filetugas']) || !empty($ts['linktugas'])) : ?>
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $sekarang = date("Y-m-d H:i:sa");
                                        $exp = date($detailmapel->getResult()[0]->tenggat);
                                        if ($sekarang >= $exp) {
                                            echo "<b>Diserahkan terlambat</b>";
                                        } else {
                                            echo "<b>Diserahkan</b>";
                                        }
                                        ?>
                                    <?php endif; ?>
                        </h6>
                        <?php
                                    if (!empty($ts['filetugas'])) {
                                        $str = explode('|', $ts['filetugas']);
                                        for ($i = 0; $i < count($str); $i++) {
                                            echo '-' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank class=card-link>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                                        }
                                    }
                        ?>
                        <?php
                                    if (!empty($ts['linktugas'])) {
                                        $str = explode(' ', $ts['linktugas']);
                                        for ($j = 0; $j < count($str); $j++) {
                                            echo '-' . '<a href=' . $str[$j] . ' target=_blank class=card-link>' . wordwrap($str[$j], 25, "<br>", TRUE) . '</a><br>';
                                        }
                                    }
                        ?>
                        <a href="<?= base_url(); ?>/detailmapelcontroller/delete/<?= $detailmapel->getResult()[0]->id_detailmapel; ?>?idtugassiswa=<?= $ts['id_tugassiswa']; ?>&idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru'] ?>" class="btn btn-danger mt-2 hapusdata">Batal</a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if (empty($tugassiswa)) : ?>
                    <a href="<?= base_url() ?>/detailmapelcontroller/createSiswa/?detailmapelsiswa=<?= $detailmapel->getResult()[0]->id_detailmapel; ?>&idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>" class="btn btn-dark mt-2">Kumpul Tugas</a>
                <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>