<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>
Tambah Data Mahasiswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="h4 mb-0">Form Tambah Data Mahasiswa</h1>
    </div>
    <div class="card-body p-4">

        <!-- Menampilkan pesan error validasi -->
        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- FORM DIMULAI DI SINI -->
        <form action="<?= site_url('mahasiswa/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="nim" class="form-label fw-bold">NIM</label>
                <input type="number" name="nim" id="nim" value="<?= old('nim') ?>" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="umur" class="form-label fw-bold">Umur</label>
                <input type="number" name="umur" id="umur" value="<?= old('umur') ?>" class="form-control" required>
            </div>
            
            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <a href="<?= site_url('mahasiswa'); ?>" class="btn btn-danger me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>

        </form> 
        <!-- FORM BERAKHIR DI SINI -->

    </div>
    <div class="card-footer text-center text-muted">
        Sistem Informasi Akademik Sederhana
    </div>
</div>

<?= $this->endSection() ?>

