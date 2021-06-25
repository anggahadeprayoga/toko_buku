<?php 

include 'config/koneksi.php';
include 'library/controller.php';

$go = new Controller();
@$id_fak = $_POST['id_fak'];
$req="?menu=cetak&id=$id_fak";

if(isset($_POST['cetak'])){
  echo "<script>document.location.href='$req'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Faktur</title>
</head>
<body>
<div class="container-fluid" id= "content" >
        <div class="card">
	        <div class="card-header">
		        Form Cetak Faktur Penjualan
	        </div>
	    <div class="card-body">
            <form action="" method="POST">
                <div class="container w-75  mt-3 pt-3" data-aos="fade-up" data-aos-delay="100">
                  <label class="form-label h5 ">NO FAKTUR :</label>
                    <div class="d-flex">
                      <select class="form-select" name="id_fak" aria-label="Default select example">
                        <option selected>PILIH ID FAKTUR/PENJUALAN</option>
                        <?php
                          @$sql = mysqli_query($con,"SELECT DISTINCT id_penjualan FROM tbl_penjualan");
                          while($data = mysqli_fetch_assoc($sql)){
	            		 			?>
                         <option value="<?= $data['id_penjualan'];?>"><?= $data['id_penjualan'];?></option>
                        <?php } ?>
                      </select>
                      <input type="submit" name="cetak" value="cetak" class="btn btn-dark text-light mx-2"></a>
                    </div>
                    <div class="mt-2">
                        
                    </div>
                </div>
            </form>
	    </div>
    </div>
</body>
</html>