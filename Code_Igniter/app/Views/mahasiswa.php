<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css');?>">
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Data Mahasiswa</h1>
        </div>
        <div class="card-body">
            <div class="action-row">
                <!-- Tombol Tambah -->
                <div>
                    <a href="<?= base_url('mahasiswa/tambah');?>" class="btn btn-success">Tambah Data</a>
                </div>
                <!-- Form untuk cari data -->
                <form action="#" method="get" class="search-form">
                    <input type="text" class="search-input" placeholder="Cari berdasarkan Nama atau NIM..." name="keyword">
                    <button class="btn search-button" type="submit">Cari</button>
                </form>
            </div>

            <!-- Data Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $i=1; foreach($getMahasiswa as $isi){?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?= $isi['nim'];?></td>
                            <td><?= $isi['nama'];?></td>
                            <td><?= $isi['umur'];?></td>
                            <td class="text-center">
                                <a href="<?= base_url('mahasiswa/detail/'.$isi['id']);?>?>" class="btn btn-info">Detail</a>
                                <a href="<?= base_url('mahasiswa/edit/'.$isi['id']);?>" class="btn btn-warning">Edit</a>
                                <a href="<?=base_url('mahasiswa/hapus/'.$isi['id']);?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i = $i +1; }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            Sistem Informasi Akademik Sederhana
        </div>
    </div>
</div>

</body>
</html>

