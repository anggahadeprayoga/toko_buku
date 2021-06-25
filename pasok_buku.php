<?php
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasok Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    LAPORAN PASOK BUKU
	    </div>
    </div>
    <div style="padding:10px;">
        <div class="table-responsive">
            <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                <tr>
                    <th>No</th>
                    <th>Nama Distributor</th>
                    <th>Judul Buku</th>
                    <th>NO ISBN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Jumlah Pasok</th>
                    <th>Tanggal</th>
                </tr>
                <?php
                $no = 1;
                    $sql = "SELECT * FROM tbl_pasok
                    INNER JOIN tbl_distributor ON tbl_pasok.id_distributor = tbl_distributor.id_distributor INNER JOIN tbl_buku ON tbl_pasok.id_buku = tbl_buku.id_buku";
                    $jalan = mysqli_query($con, $sql);
                    while($r= mysqli_fetch_array($jalan)){
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['nama_distributor']?></td>
                    <td><?php echo $r['judul']?></td>
                    <td><?php echo $r['noisbn']?></td>
                    <td><?php echo $r['penulis']?></td>
                    <td><?php echo $r['penerbit']?></td>
                    <td><?php echo $r['harga_pokok']?></td>
                    <td><?php echo $r['stok']?></td>
                    <td><?php echo $r['jumlah']?></td>
                    <td><?php echo $r['tanggal']?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>