<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= $_SESSION["username"]; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/home">Home</a>
                </li>
                <?php if ($_SESSION["status"] === "guru") : ?>
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/kelas">Kelas</a>
                <?php endif; ?>
                <?php if ($_SESSION["status"] === "siswa") : ?>
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/kelasmapel/siswa">Mapel Kelas</a>
                <?php endif; ?>
                <?php if ($_SESSION["status"] === "admin") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/guru">Guru</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/siswa">Siswa</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/user">User</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/mapel">Mapel</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/kelas">Kelas</a></li>
                            <li><a href="<?= base_url(); ?>/register" class="dropdown-item">Eluser</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url() ?>/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>