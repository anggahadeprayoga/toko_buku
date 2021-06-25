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
    <title>Input Pasok Buku</title>
</head>
<body>
    <div class="container-fluid" id= "content" >
    <div class="card">
        <div class="card-header">
		    Form Pasok Buku
	    </div>
	    <div class="card-body">
            <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Penulis</label>
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset class="form-group">
                    <select class="form-select" id="basicSelect" name="penulis">
                        <?php
                        $no = 0;
                        $sql = "SELECT * FROM tbl_buku GROUP BY penulis";
                        $jalan = mysqli_query($con, $sql);
                        while($r = mysqli_fetch_assoc($jalan)){
                            $no++
                    ?>
                        <option value=""></option>
                        <option value="<?php echo $r['penulis'] ?>"><?php echo $r['penulis']?></option>
                    <?php } ?>
                    <?php if ($no == ""){
                        echo "<tr><td colspan='7'>No Record</td></tr>";
                    }?>
                    </select>
                </fieldset>              
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" name=cari value=cari>  
                </div>
            </form>
	    </div>
        <div class="table-responsive">
        <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>NO ISBN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>Diskon</th>
                </tr>
                <?php
                    
                    if(isset($_POST['cari'])){
                    @$penulis = $_POST['penulis'];
                    $barang = mysqli_query($con,"SELECT * FROM tbl_buku WHERE penulis = '$penulis'");
                    while($b = mysqli_fetch_array($barang)){
                ?>
                <tr>
                    <td><?php echo $b['id_buku']?></td>
                    <td><?php echo $b['judul']?></td>
                    <td><?php echo $b['noisbn']?></td>
                    <td><?php echo $b['penulis']?></td>
                    <td><?php echo $b['penerbit']?></td>
                    <td><?php echo $b['tahun']?></td>
                    <td><?php echo $b['stok']?></td>
                    <td><?php echo "Rp. ".number_format($b['harga_pokok'])." ,-"; ?></td>
                    <td><?php echo "Rp. ".number_format($b['harga_jual'])." ,-"; ?></td>
                    <td><?php echo $b['diskon']?>%</td>
                </tr>
                <?php }} ?>
                </table>
        </div>
    </div>
</body>
</html>
                        


