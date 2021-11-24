<?php 

require 'function.php';

session_start();

if (!empty($_SESSION)) {
    session_destroy();
}

//query semua data
$matakuliah = query('SELECT * FROM matakuliah');

//ketika tombol tambah ditekan
if (isset($_POST["submit"])) {
    //cek apakah berhasil ditambahkan
    if(tambah_mk($_POST) > 0) {
        echo "
            <script>
            alert('Data BERHASIL Ditambahkan');
            document.location.href = 'dashboard.php';
            </script>  
        ";
    } else {
        echo "
            <script>
            alert('Data GAGAL Ditambahkan');
            document.location.href = 'dashboard.php';
            </script>        
        ";
    }
}

//ketika tombol edit/hapus ditekan
if (isset($_GET["hal"])) {
    if ($_GET["hal"] == "hapus") {
        $hapus = mysqli_query($conn, "DELETE FROM matakuliah WHERE id='$_GET[id]' ");
        if ($hapus) {
            echo "
            <script>
            alert('Data BERHASIL Dihapus');
            document.location.href = 'dashboard.php';
            </script>  
        ";
        } else {
            echo "
            <script>
            alert('Data GAGAL Dihapus');
            document.location.href = 'dashboard.php';
            </script>        
        ";
        }
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            background-color: rgb(197, 197, 255);
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #062538;
            font-family: 'Poppins', sans-serif;
        }

        .container h1 {
            font-weight: bold;
        }

        footer {
            background-color: #062538;
        }
    </style>

    <title>Dashboard CRUD</title>
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">D3TI AMIKOM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="dashboard.php">Home</a>
                    <a class="nav-link" href="">Detail</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mt-3">Selamat Datang di Halaman Dashboard</h1>
        <div class="card mt-4">
            <h4 class="card-header bg-primary text-white">Daftar Matakuliah</h4>
            <div class="card-body">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Tambah Daftar Matakuliah
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Matakuliah : </label>
                                <input type="text" name="kode" onkeyup="this.value = this.value.toUpperCase();" class="form-control" id="kode" placeholder="Masukan Kode Matakuliah" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Matakuliah : </label>
                                <input type="text" name="nama" onkeyup="this.value = this.value.toUpperCase();" class="form-control" id="nama" placeholder="Masukan Nama Matakuliah" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Matakuliah : <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" cols="100"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>

                <table class="table table-striped table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">NO.</th>
                            <th scope="col">KODE</th>
                            <th scope="col">NAMA MATAKULIAH</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>

                    <?php $i=1; ?>
                    <?php foreach($matakuliah as $row) : ?>
                    <tbody class="align-baseline">
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["kode"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td>
                                <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-info" role="button">Detail</a>
                                <a href="ubah_mk.php?id=<?= $row["id"]; ?>" class="btn btn-warning" role="button">Ubah</a>
                                <a href="dashboard.php?hal=hapus&id=<?= $row['id']; ?>" class="btn btn-danger" role="button" onclick="confirm('Apakah anda yakin untuk menghapus data ?')">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <footer class="text-center text-white pt-3 pb-2">
        <div class="text-center text-white">
            Yoogy Handi Nata 20.01.4515 | D3TI | Universitas Amikom Yogyakarta
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>