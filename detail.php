<?php 

require 'function.php';

session_start();

if (empty($_SESSION)) {
    $_SESSION['id_mk'] = $_GET["id"];
}

$id_mk = $_SESSION["id_mk"];

$mk = query("SELECT * FROM matakuliah WHERE id = $id_mk")[0];

$detail = query("SELECT * FROM detail WHERE id_matakuliah = $id_mk");

if (isset($_POST["submit"])) {
    //cek apakah berhasil ditambahkan
    if(tambah_pertemuan($_POST) > 0) {
        echo "
            <script>
            alert('Data BERHASIL Ditambahkan');
            document.location.href = 'detail.php?id=$id_mk';
            </script>  
        ";
    } else {
        echo "
            <script>
            alert('Data GAGAL Ditambahkan');
            document.location.href = 'detail.php?id=$id_mk';
            </script>        
        ";
    }
}

if (isset($_GET["hal"])) {
    if ($_GET["hal"] == "hapus") {
        $hapus = mysqli_query($conn, "DELETE FROM detail WHERE id_detail='$_GET[id]' ");
        if ($hapus) {
            echo "
            <script>
            alert('Data BERHASIL Dihapus');
            document.location.href = 'detail.php?id=$id_mk';
            </script>  
        ";
        } else {
            echo "
            <script>
            alert('Data GAGAL Dihapus');
            document.location.href = 'detail.php?id=$id_mk';
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

        html {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: rgb(197, 197, 255);
        }

        .navbar {
            background-color: #062538;;
        }
    </style>

    <title>Detail Mata Kuliah</title>
  </head>
  <body>
    <nav class="navbar navbar-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">D3TI AMIKOM</span>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-4">
            <h4 class="card-header bg-primary text-white">Detail Matakuliah</h4>
            <div class="card-body">
                <div class="card" style="width: 30rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b> Kode : </b><?= $mk["kode"]; ?></li>
                        <li class="list-group-item"><b>Nama Matakuliah : </b><?= $mk["nama"]; ?></li>
                        <li class="list-group-item"><b>Deskripsi : </b><?= $mk["deskripsi"]; ?></li>
                    </ul>
                </div>

                <button class="btn btn-success mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Tambah Pertemuan
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="" method="post">
                            <input type="hidden" value="<?= $id_mk; ?>" name="id_matakuliah">
                            <div class="mb-3">
                                <label for="pertemuan" class="form-label">Pertemuan Matakuliah : </label>
                                <input type="text" name="pertemuan"class="form-control" id="pertemuan" placeholder="Masukan Pertemuan Matakuliah">
                            </div>
                            <div class="mb-3">
                                <label for="materi" class="form-label">Materi Pertemuan : </label>
                                <input type="text" name="materi"class="form-control" id="materi" placeholder="Masukan Materi Pertemuan">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
                
                <table class="table table-striped table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">NO.</th>
                            <th scope="col">PERTEMUAN</th>
                            <th scope="col">DAFTAR MATERI</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    
                    <?php $i=1; ?>
                    <?php foreach($detail as $row_detail) : ?>
                    <tbody class="align-baseline">
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row_detail["pertemuan"]; ?></td>
                            <td><?= $row_detail["materi"]; ?></td>
                            <td>
                                <a href="ubah_pertemuan.php?id=<?= $row_detail['id_detail']; ?>" class="btn btn-warning" role="button">Ubah</a>
                                <a href="detail.php?hal=hapus&id=<?= $row_detail['id_detail']; ?>" class="btn btn-danger"  onclick="confirm('Apakah anda yakin untuk menghapus data ?')" role="button">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>