<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>
Tambah Data Dosen
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="h4 mb-0">Form Tambah Data Dosen</h1>
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
        <form action="<?= site_url('dosen/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="nip" class="form-label fw-bold">NIP</label>
                <input type="text" name="nip" id="nip" value="<?= old('nip') ?>" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="gender" class="form-label fw-bold">Gender</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Gender --</option>
                    <option value="Pria" <?= old('gender') === 'Pria' ? 'selected' : '' ?>>Pria</option>
                    <option value="Wanita" <?= old('gender') === 'Wanita' ? 'selected' : '' ?>>Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label fw-bold">No. Telp</label>
                <input type="text" name="telp" id="telp" value="<?= old('telp') ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" class="form-control" required>
            </div>
            
            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <a href="<?= site_url('dosen'); ?>" class="btn btn-danger me-2">Kembali</a>
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
