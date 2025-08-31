<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url(relativePath: 'css/page.css');?>">
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

            <form method="post" action="<?= base_url('mahasiswa/update');?>">
                <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
                <div class="form-group">
                    <label for=""><b>NIM</b></label>
                    <input type="number" name="nim" value="<?= $mahasiswa['nim'] ?>" minlength="1" maxlength="11"class="form-control" required>
                </div>
                <div class="form-group">
                    <label for=""><b>Nama</b></label>
                     <input type="text" name="nama"value="<?= $mahasiswa['nama'] ?>" minlength="1" maxlength="25" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label for=""><b>Umur</b></label>
                    <input type="number" name="umur" value="<?= $mahasiswa['umur'] ?>" minlength="1" maxlength="3"class="form-control" required>
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('/'); ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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

