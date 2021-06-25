

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pasok Buku</title>
    </head>
    <body>

        <?php
            include '../config/koneksi.php';
            include '../library/controller.php';
            $go = new controller();
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <?php
                                            $no = 0;
                                            $sql = "SELECT * FROM tbl_distributor";
                                            $jalan = mysqli_query($con, $sql);
                                            while($r = mysqli_fetch_assoc($jalan)){
                                                $no++
                                        ?>
                                	<fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="iddistributor">
                                    <?php
                                    foreach($distributor as $r){
                                    ?>
                                    <option value="<?php echo $r['id_distributor'] ?>"><?php echo $r['nama_distribuor']?></option>
                                    <?php } ?>
                                    </select>
                                </fieldset>
                                        <?php } if ($no == ""){
                                            echo "<tr><td colspan='7'>No Record</td></tr>";
                                        }?>
                                <div class="modal-footer">
                                <input class="btn btn-primary" type="submit" name=cari value=cari>  
                            </div>
</form>
</body>
</html>


