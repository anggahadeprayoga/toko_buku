<?php
include 'config/koneksi.php';

@$sql="SELECT * FROM tbl_setting_lap";
$tampil=mysqli_fetch_assoc(mysqli_query($con,$sql));

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" href="css/style.css">

    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid" >
    <a class="navbar-brand" href="admin.php" style="color:white;">Administrator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin.php" style="color:white;">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
            Inputan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?menu=input_distri">Input Distributor</a></li>
            <li><a class="dropdown-item" href="?menu=input_buku">Input Buku</a></li>
            <li><a class="dropdown-item" href="?menu=input_pasok">Input Pasok Buku</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="color:white;">
            Laporan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?menu=data_buku">Semua Data Buku</a></li>
            <li><a class="dropdown-item" href="?menu=filter_penulis">Filter Penulis Buku</a></li>
            <li><a class="dropdown-item" href="?menu=buku_sering_terjual">Buku yang Sering Terjual</a></li>
            <li><a class="dropdown-item" href="?menu=buku_tidak_terjual">Buku yang Tidak Pernah Terjual</a></li>
            <li><a class="dropdown-item" href="?menu=pasok_buku">Pasok Buku</a></li>
            <li><a class="dropdown-item" href="?menu=filter_buku">Filter Pasok Buku</a></li>
          </ul>
        </li>
    </ul>
    <form class="d-flex">
        <ul class="nav navbar-expand-lg justify-content-end ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                    Admin
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?menu=ubah_pass">Ubah Password</a></li>
                </ul>
            </li>
            <li class="nav-right">
                <a class="nav-link" aria-current="page" href="logout.php" style="color:white;">logout</a>
            </li>
        </ul>
      </form>
    </div>
  </div>
</nav>

<br>
<?php 
    switch(@$_GET['menu']){
        case 'input_distri';
        include 'input_distri.php';
        break;

        case 'input_buku';
        include 'input_buku.php';
        break;

        case 'input_pasok';
        include 'input_pasok.php';
        break;

        case 'data_buku';
        include 'data_buku.php';
        break;

        case 'filter_penulis';
        include 'filter_penulis.php';
        break;

        case 'buku_sering_terjual';
        include 'buku_sering_terjual.php';
        break;

        case 'buku_tidak_terjual';
        include 'buku_tidak_terjual.php';
        break;

        case 'pasok_buku';
        include 'pasok_buku.php';
        break;

        case 'filter_buku';
        include 'filter.php';
        break;

        case 'ubah_pass';
        include 'ubah_pass.php';
        break;
        
        break;
    }
?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>