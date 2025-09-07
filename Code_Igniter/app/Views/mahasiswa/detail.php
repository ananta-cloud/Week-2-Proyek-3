<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>
Detail Data Mahasiswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="h4 mb-0">Detail Data Mahasiswa</h1>
    </div>
    <div class="card-body p-4">

        <?php if (!empty($mahasiswa)): ?>
            <div class="mb-3">
                <label class="form-label fw-bold">NIM</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($mahasiswa['nim']); ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($mahasiswa['nama']); ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Umur</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($mahasiswa['umur']); ?></p>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <a href="<?= site_url('mahasiswa'); ?>" class="btn btn-danger">Kembali</a>
            </div>

        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Data mahasiswa yang Anda cari tidak dapat ditemukan.
            </div>
        <?php endif; ?>

    </div>
    <div class="card-footer text-center text-muted">
        Sistem Informasi Akademik Sederhana
    </div>
</div>

<?= $this->endSection() ?>

