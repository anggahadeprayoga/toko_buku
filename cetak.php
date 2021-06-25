<?php 

include 'config/koneksi.php';
include 'library/controller.php';

@$id_fak=$_GET['id'];

@$sql = mysqli_query($con,"SELECT * FROM tbl_penjualan WHERE id_penjualan = '$id_fak'");
@$data = mysqli_fetch_assoc($sql);			 					

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Penjualan</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    CETAK STRUK PENJUALAN
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <div class="table-responsive">
          <table class="data table table-dark table-striped table-bordered border-light table-hover py-3 display" id="">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Buku</th>
                  <th>Jumlah Beli</th>
                  <th>Harga</th>
                  <th>PPN</th>
                  <th>Diskon</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody class="table-light">
              <?php
                    $no=0;
                    
                    @$sql = mysqli_query($con,"SELECT * FROM tbl_penjualan INNER JOIN tbl_buku USING(id_buku) WHERE id_penjualan = '$id_fak'");
                    while($data = mysqli_fetch_assoc($sql)){
                      
                    $no++;
                  ?>
                  <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data['judul'] ?></td>
                  <td><?php echo $data['jumlah_beli'] ?></td>
                  <td><?php echo $data['harga_jual'] ?></td>
                  <td><?php echo $data['ppn'] ?>%</td>
                  <td><?php echo $data['diskon'] ?>%</td>
                  <td><?php @$total = (intval($data['jumlah_beli'])*intval($data['harga_jual']));  echo $total; ?></td>
                  </tr>
                  <?php } ?> 
                </tbody> 
                <tfoot class="table-secondary">
                <?php 
                @$sql = mysqli_query($con,"SELECT * FROM tbl_penjualan WHERE id_penjualan = '$id_fak'");
                @$data = mysqli_fetch_assoc($sql);
                ?>
                  <tr>
                    <td colspan="2">Total buku</td>
                    <?php 
                       $sql = mysqli_fetch_array(mysqli_query($con,"SELECT jumlah_beli,sum(jumlah_beli) AS jumlah_beli FROM tbl_penjualan WHERE id_penjualan = '$id_fak' "));
                    ?>
                    <td colspan="2" ><?= $sql['jumlah_beli'] ?>&nbsp;&nbsp;&nbsp;<strong>BUKU</strong></td>
                    <td>Total Harga | setelah diskon dan pajak </td>
                    <td colspan="2"><?php echo $data['total_harga']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td>Bayar</td>
                    <td colspan="2"><?php echo $data['bayar']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td>Kembalian</td>
                    <td colspan="2"><?php echo $data['kembalian']; ?></td>
                  </tr>
                </tfoot>
    </table>
    <a class="w-100 btn btn-dark mt-2">CETAK</a>
    <a class="w-100 btn btn-dark mt-1" href="?menu=cetak_faktur">KEMBALI</a>
    </div>
    </div>
	</div>
</div>
</body>
</html>