<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>
Detail Data Dosen
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="h4 mb-0">Detail Data Dosen</h1>
    </div>
    <div class="card-body p-4">

        <?php if (!empty($dosen)): ?>
            <div class="mb-3">
                <label class="form-label fw-bold">NIP</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($dosen['nip']); ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($dosen['nama']); ?></p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Gender</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($dosen['gender']); ?></p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">No. Telp</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($dosen['telp']); ?></p>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <p class="form-control-plaintext bg-light p-2 rounded"><?= esc($dosen['email']); ?></p>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <a href="<?= site_url('dosen'); ?>" class="btn btn-danger">Kembali</a>
            </div>

        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Data dosen yang Anda cari tidak dapat ditemukan.
            </div>
        <?php endif; ?>

    </div>
    <div class="card-footer text-center text-muted">
        Sistem Informasi Akademik Sederhana
    </div>
</div>

<?= $this->endSection() ?>
