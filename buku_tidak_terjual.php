<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_tmp_penjualan INNER JOIN tbl_buku ON tbl_tmp_penjualan.id_buku = tbl_buku.id_buku WHERE jumlah penjualan = 0";
@$field = array('id_buku'=>$_POST['kode_buku'],'judul'=>$_POST['judul_buku'], 'noisbn'=>$_POST['isbn'], 'penulis'=>$_POST['penulis'], 'penerbit'=>$_POST['penerbit'], 'tahun'=>$_POST['tahun_terbit'], 'stok'=>$_POST['stok'], 'harga_pokok'=>$_POST['harga_pokok'], 'harga_jual'=>$_POST['harga_jual'], 'diskon'=>$_POST['diskon']);
$redirect = "?menu=input_buku";
@$where = "id_buku = $_GET[id]";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Yang Tidak Pernah Terjual</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    DATA BUKU TIDAK TERJUAL
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
                            $data = "SELECT * FROM tbl_buku WHERE id_buku NOT IN (SELECT id_buku FROM tbl_penjualan)";
                            $jalan = mysqli_query($con,$data);
         
                            while($r= mysqli_fetch_array($jalan)){
                            $no++
                        ?>
                        <tr>
                             <td><?php echo $no ?></td>
                             <td><?php echo $r['id_buku']?></td>
                             <td><?php echo $r['judul']?></td>
                             <td>0</td>
                        </tr>
                        <?php }  ?>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>