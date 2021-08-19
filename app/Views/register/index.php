<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>FSELEARNING - Registrasi</title>
</head>

<body>
    <div class="d-flex justify-content-center position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col">
                <h1>FSELEARNING - Registrasi</h1>
                <a href="<?= base_url(); ?>/login" class="btn btn-primary">Login</a>
                <?php if (isset($error)) : ?>
                    <p style="color: red;">Input hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!<br></p>
                <?php endif; ?>
                <form action="<?= base_url(); ?>/register/save" method="post">
                    <input type="hidden" name="status" id="status" value="siswa">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>