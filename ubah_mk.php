<?php 

require 'function.php';

$id_mk = $_GET["id"];

$mk = query("SELECT * FROM matakuliah WHERE id = $id_mk")[0];



if (isset($_POST["submit"])) {
    //cek apakah berhasil diubah
    if(ubah_mk($_POST) > 0) {
        echo "
            <script>
            alert('Data BERHASIL Diubah');
            document.location.href = 'dashboard.php';
            </script>  
        ";
    } else {
        echo "
            <script>
            alert('Data GAGAL Diubah');
            document.location.href = 'dashboard.php';
            </script>        
        ";
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
                    <a class="nav-link" href="dashboard.php">Home</a>
                    <a class="nav-link active" href="detail.php">Edit</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-header bg-primary text-white mb-4">Ubah Daftar Matakuliah</h4>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mk["id"]; ?>">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Matakuliah : </label>
                            <input type="text" name="kode" onkeyup="this.value = this.value.toUpperCase();" class="form-control" id="kode" value="<?= $mk["kode"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Matakuliah : </label>
                            <input type="text" name="nama" onkeyup="this.value = this.value.toUpperCase();" class="form-control" id="nama" value="<?= $mk["nama"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Matakuliah : </label>
                            <input type="text" name="deskripsi"class="form-control" id="deskripsi" value="<?= $mk["deskripsi"]; ?>">
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>