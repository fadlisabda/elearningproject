<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?= $_SESSION["username"]; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(); ?>/homecontroller">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($_SESSION["status"] === "guru") : ?>
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/kelasmapelcontroller/index">Kelas</a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === "siswa") : ?>
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/kelasmapelcontroller/siswa">Mapel Kelas</a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === "admin") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data Master
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>/gurucontroller">Guru</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/siswacontroller">Siswa</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/usercontroller">User</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/mapelcontroller">Mapel</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/kelascontroller">Kelas</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/elusercontroller">ElUser</a>
                    </div>
                </li>
            <?php endif; ?>
            <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?= base_url() ?>/logoutcontroller">Logout</a>
            </li>
        </ul>
    </div>
</nav>