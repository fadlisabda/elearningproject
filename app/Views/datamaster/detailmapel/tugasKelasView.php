<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/logincontroller");
    exit;
}
?>
<div class="container">
    <a href="<?= base_url(); ?>/detailmapelcontroller/index/<?= $_GET['idkelas']; ?>/<?= $_GET['namamapel']; ?>/<?= $_GET['namakelas']; ?>/<?= $_GET['namaguru']; ?>" class="btn btn-danger mb-2 mt-2">Kembali</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">JUDUL</th>
                <th scope="col">TENGGAT</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tugaskelas->getResult() as $tk) : ?>
                <?php if ($tk->namamapel === $namamapel && $tk->namakelas === $namakelas && $tk->namaguru === $namaguru && $tk->tipe === 'tugas') : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $tk->judul ?></td>
                        <td><?= $tk->tenggat ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>