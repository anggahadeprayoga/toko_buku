<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Pasok Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		   Filter Pasok Berdasarkan Distributor
	    </div>
	    <div class="card-body">
                <form method="post">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Distributor</label>
                <select class="form-control" id="exampleFormControlInput1" name="distributor">
                <?php
                        $no = 0;
                        $sql = "SELECT * FROM tbl_distributor GROUP BY nama_distributor";
                        $jalan = mysqli_query($con, $sql);
                        while($r = mysqli_fetch_assoc($jalan)){
                            $no++
                    ?>
                        <option value=""></option>
                        <option value="<?php echo $r['nama_distributor'] ?>"><?php echo $r['nama_distributor']?></option>
                    <?php } ?>
                    <?php if ($no == ""){
                        echo "<tr><td colspan='7'>No Record</td></tr>";
                    }?>
                </select>
                <button class="btn btn-primary " name="lihat" style="height:40px; width:100px; text-align:center; margin-top:10px;" type="submit">Lihat</button>
            </form>
        </div>
        <div class="table-responsive">
            <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                <tr>
                    <td colspan='7'>Data Pasok Distributor:<?php echo $_POST['distributor'] ?></td>
                </tr>
                <tr>
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
                @$distributor = $_POST['distributor'];
                if(isset($_POST['lihat'])){    
                    $sql = "SELECT * FROM tbl_pasok INNER JOIN tbl_distributor ON tbl_pasok.id_distributor = tbl_distributor.id_distributor INNER JOIN tbl_buku ON tbl_pasok.id_buku = tbl_buku.id_buku WHERE nama_distributor = '$distributor' ORDER BY id_pasok DESC";
                    $jalan = mysqli_query($con, $sql);
                    while($r= mysqli_fetch_array($jalan)){
                ?>
                <tr>
                    <td><?php echo $r['judul']?></td>
                    <td><?php echo $r['noisbn']?></td>
                    <td><?php echo $r['penulis']?></td>
                    <td><?php echo $r['penerbit']?></td>
                    <td><?php echo $r['harga_pokok']?></td>
                    <td><?php echo $r['stok']?></td>
                    <td><?php echo $r['jumlah']?></td>
                    <td><?php echo $r['tanggal']?></td>
                </tr>
                <?php }} ?>
            </table>
        </div>
	</div>
</div>
</body>
</html>