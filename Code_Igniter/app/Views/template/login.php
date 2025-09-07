<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="<?=base_url('css/login.css');?>">
</head>
<body>

    <div class="login-card">
        <h2 class="login-title">Halaman Login</h2>

        <!-- Menampilkan pesan error validasi atau login gagal -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('errors')) : ?>
            <div class="alert-danger">
                <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- Form Login -->
        <form action="<?= site_url('login/process') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn-submit">Login</button>

        </form>
    </div>

</body>
</html>

