<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_tmp_penjualan";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Yang Sering Terjual</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    DATA BUKU BANYAK TERJUAL
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <div class="table-responsive">
                    <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Total Jumlah Beli</th>
                        </tr>
                        <?php 
            
            $no = 0;
            $sql = "SELECT DISTINCT id_buku from tbl_penjualan ";
            $jalan = mysqli_query($con, $sql);
            
              
              // if ($jalan == "") {
              //     echo "<tr><td colspan='4'>No Record</td></tr>";
              
              // } else{

              // foreach($jalan as $r){
              //     $no++
              // $query=mysqli_fetch_assoc($jalan);
              while ($r = mysqli_fetch_assoc($jalan)){
              $query = "SELECT * from tbl_penjualan WHERE id_buku = '$r[id_buku]' ";
              $data = mysqli_fetch_assoc(mysqli_query($con,$query));
              $data2 = mysqli_fetch_assoc(mysqli_query($con,"SELECT judul FROM tbl_buku WHERE id_buku = '$r[id_buku]'"));
              $total_jual = mysqli_fetch_array(mysqli_query($con,"SELECT jumlah_beli,sum(jumlah_beli) AS jumlah_beli FROM tbl_penjualan WHERE id_buku = '$r[id_buku]' "));
              $no++;
          ?>
          <tr>
              <td><?=  $no ?></td>
              <td><?=  $data['id_buku'] ?></td>
              <td><?=  $data2['judul'] ?></td>
              <td><?=  $total_jual['jumlah_beli'] ?></td>
          </tr>
          <?php }  ?>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>