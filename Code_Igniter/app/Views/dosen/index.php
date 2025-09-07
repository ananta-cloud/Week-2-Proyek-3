<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>
Data Mahasiswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
    <a href="<?= site_url('dosen/create') ?>" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Tambah Dosen
    </a>
</div>

<!-- Menampilkan pesan flashdata -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">NIP</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Gender</th>
                <th scope="col" class="text-center">Telp</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dosen) && is_array($dosen)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($dosen as $ds) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= esc($ds['nip']); ?></td>
                        <td><?= esc($ds['nama']); ?></td>
                        <td class="text-center"><?= esc($ds['gender']); ?></td>
                        <td class="text-center"><?= esc($ds['telp']); ?></td>
                        <td class="text-center"><?= esc($ds['email']); ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('dosen/detail/' . $ds['id']) ?>" class="btn btn-sm btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                            <a href="<?= site_url('dosen/edit/' . $ds['id']) ?>" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <form action="<?= site_url('dosen/delete/' . $ds['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data Dosen.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

