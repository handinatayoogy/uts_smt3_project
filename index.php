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
            background-color: #062538;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #062538;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #062538;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background-color: #062538;
            color: white;
        }

        .judul {
            font-size: 50px;
            font-weight: bold;
        }

    </style>

    <title>UTS CRUD</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">UTS CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">About</a>
                <a class="nav-link" href="#">Contact</a>
            </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg align-self-center">
                <h1 class="judul">Hallo! Selamat Datang di Website UTS CRUD</h1>
                <p>Nama : Yoogy Handi Nata</p>
                <p>NIM : 20.01.4515</p>
                <a href="dashboard.php" class="btn btn-warning">Masuk</a>
            </div>
            <div class="col-lg">
                <img src="img/image.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>