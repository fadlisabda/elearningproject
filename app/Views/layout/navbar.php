<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?= $_SESSION["username"]; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(); ?>/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($_SESSION["status"] === "guru") : ?>
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/kelasmapel">Kelas</a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === "siswa") : ?>
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/kelasmapel/siswa">Mapel Kelas</a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION["status"] === "admin") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data Master
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>/guru">Guru</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/siswa">Siswa</a>
                        <!-- <a class="dropdown-item" href="<?= base_url(); ?>/user">User</a> -->
                        <a class="dropdown-item" href="<?= base_url(); ?>/eluser">User</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/mapel">Mapel</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>/kelas">Kelas</a>
                    </div>
                </li>
            <?php endif; ?>
            <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="<?= base_url() ?>/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>