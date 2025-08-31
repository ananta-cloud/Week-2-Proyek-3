<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/page.css');?>">
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Data Mahasiswa</h1>
        </div>
        <div class="card-body">

            <!-- Data Table -->
            <div class="table-container">
                 <form method="post" action="<?= base_url('mahasiswa/add');?>">
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="number" name="nim" minlength="1" min maxlength="11" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                     <input type="text" name="nama" min="1" maxlength="25"class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" name="umur" min="1" maxlength="3"class="form-control" required>
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('/'); ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
            </div>
        </div>
        <div class="card-footer">
            Sistem Informasi Akademik Sederhana
        </div>
    </div>
</div>

</body>
</html>

