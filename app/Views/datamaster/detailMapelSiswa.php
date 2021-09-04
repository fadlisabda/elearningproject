<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title float-end">Tenggat : <?= $detailmapelsiswa['tenggat']; ?></h5>
                    <h5 class="card-title"><?= $detailmapelsiswa['judul']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $detailmapelsiswa['namaguru']; ?></h6>
                    <p class="card-text"><?= $detailmapelsiswa['keterangan']; ?></p>
                    <a href="<?= base_url(); ?>/detailmapel/index/<?= $_GET['idkelas']; ?>/<?= $detailmapelsiswa['namamapel']; ?>/<?= $detailmapelsiswa['namakelas']; ?>/<?= $detailmapelsiswa['namaguru']; ?>" class="btn btn-warning mt-2">Kembali</a>
                </div>
            </div>
        </div>
        <?php if ($_SESSION['status'] === 'siswa') : ?>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tugas Anda</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php if (empty($detailmapelsiswa['tugassiswa']) || $detailmapelsiswa['tenggat'] === '0000-00-00 00:00:00') : ?>
                                Tidak Ada
                            <?php elseif (!empty($detailmapelsiswa['tugassiswa'])) : ?>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $sekarang = date("Y-m-d H:i:sa");
                                $exp = date($detailmapelsiswa['tenggat']);
                                if ($sekarang >= $exp) {
                                    echo "<b>Diserahkan terlambat
                                </b>";
                                } else {
                                    echo "<b>Diserahkan</b>";
                                }
                                ?>
                            <?php endif; ?>
                        </h6>
                        <?php
                        $str = explode('|', $detailmapelsiswa['tugassiswa']);
                        for ($i = 0; $i < count($str); $i++) {
                            echo '-' . '<a href=' . base_url() . '/public/file/' .  $str[$i]  . ' target=_blank class=card-link>' . wordwrap($str[$i], 25, "<br>", TRUE) . '</a><br>';
                        }
                        ?>

                        <a href="<?= base_url() ?>/detailmapel/edit/<?= $detailmapelsiswa['id_detailmapel']; ?>?idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>" class="btn btn-dark mt-2">Tambah</a>

                        <a href="<?= base_url(); ?>/detailmapel/delete/<?= $detailmapelsiswa['id_detailmapel']; ?>?idkelas=<?= $_GET['idkelas']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru'] ?>" class="btn btn-danger mt-2" onclick="return confirm('apakah anda yakin?');">Batal</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>