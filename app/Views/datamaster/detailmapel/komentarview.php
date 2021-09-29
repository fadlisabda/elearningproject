<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (!isset($_SESSION["login"])) {
    header("Location: " . base_url() . "/login");
    exit;
}
?>
<?php if (isset($_GET['tambah'])) : ?>
    <div class="flash-data" data-flashdata="Ditambah"></div>
<?php endif; ?>
<?php if (isset($_GET['delete'])) : ?>
    <div class="flash-data" data-flashdata="Dihapus"></div>
<?php endif; ?>
<div class="container">
    <?php if ($_SESSION['status'] == 'siswa') : ?>
        <a href="<?= base_url() ?>/komentar/create?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&komentar=<?= $_GET['komentar']; ?>" class="btn btn-primary mt-2 mb-2">Tambahkan Komentar</a>
    <?php endif; ?>

    <?php if ($_SESSION['status'] == 'guru' && $_GET['komentar'] == 'kelas') : ?>
        <a href="<?= base_url() ?>/komentar/create?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&komentar=<?= $_GET['komentar']; ?>" class="btn btn-primary mt-2 mb-2">Tambahkan Komentar</a>
    <?php endif; ?>

    <a href="<?= base_url(); ?>/detailmapel/siswa/<?= $_GET['detailmapelsiswa']; ?>?namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru'] ?>" class="btn btn-danger mb-2 mt-2">Kembali</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">KOMENTAR</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($komentar->getResult() as $k) : ?>
                    <?php if ($_SESSION['status'] == 'siswa' && $k->username == $_SESSION['username'] && $k->id_detailmapel == $id && $k->status == 'pribadi' && $_GET['komentar'] == 'pribadi') : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <?php if ($k->tipe == 'guru') : ?>
                                <td><?= $k->tipe; ?></td>
                            <?php endif; ?>
                            <?php if ($k->tipe == 'siswa') : ?>
                                <td><?= $k->username; ?></td>
                            <?php endif; ?>
                            <td>
                                <?php
                                $str = $k->komentar;
                                echo wordwrap($str, 91, "<br>", TRUE);
                                ?>
                            </td>
                            <?php if ($k->tipe == 'siswa') : ?>
                                <td>
                                    <a href="<?= base_url(); ?>/komentar/delete/<?= $k->id_komentar; ?>?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&status=<?= $_GET['komentar']; ?>" class="btn btn-danger hapusdata">Delete</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endif; ?>
                    <?php if ($k->id_detailmapel == $id && $_GET['komentar'] == 'kelas' && $k->status == 'kelas') : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <?php if ($k->tipe == 'guru') : ?>
                                <td><?= $k->tipe; ?></td>
                            <?php endif; ?>
                            <?php if ($k->tipe == 'siswa') : ?>
                                <td><?= $k->username; ?></td>
                            <?php endif; ?>
                            <td>
                                <?php
                                $str = $k->komentar;
                                echo wordwrap($str, 91, "<br>", TRUE);
                                ?>
                            </td>
                            <?php if ($k->username == $_SESSION['username'] && $_SESSION['status'] == 'siswa') : ?>
                                <td>
                                    <a href="<?= base_url(); ?>/komentar/delete/<?= $k->id_komentar; ?>?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&status=<?= $_GET['komentar']; ?>" class="btn btn-danger hapusdata">Delete</a>
                                </td>
                            <?php endif; ?>
                            <?php if ($_SESSION['status'] == 'guru') : ?>
                                <td>
                                    <a href="<?= base_url(); ?>/komentar/delete/<?= $k->id_komentar; ?>?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&status=<?= $_GET['komentar']; ?>" class="btn btn-danger hapusdata">Delete</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endif; ?>
                    <?php if ($_SESSION['status'] == 'guru' &&  $k->id_detailmapel == $id && $k->status == 'pribadi' && $_GET['komentar'] == 'pribadi') : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <?php if ($k->tipe == 'guru') : ?>
                                <td><?= $k->tipe; ?></td>
                            <?php endif; ?>
                            <?php if ($k->tipe == 'siswa') : ?>
                                <td><?= $k->username; ?></td>
                            <?php endif; ?>
                            <td>
                                <?php
                                $str = $k->komentar;
                                echo wordwrap($str, 91, "<br>", TRUE);
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>/komentar/create?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&komentar=<?= $_GET['komentar']; ?>&username=<?= $k->username ?>" class="btn btn-primary mt-2 mb-2">Balas Komentar</a>

                                <a href="<?= base_url(); ?>/komentar/delete/<?= $k->id_komentar; ?>?detailmapelsiswa=<?= $_GET['detailmapelsiswa']; ?>&namamapel=<?= $_GET['namamapel']; ?>&namakelas=<?= $_GET['namakelas']; ?>&namaguru=<?= $_GET['namaguru']; ?>&status=<?= $_GET['komentar']; ?>" class="btn btn-danger hapusdata">Delete</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>