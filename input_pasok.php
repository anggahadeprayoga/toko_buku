<?php
include "config/koneksi.php";
include "library/controller.php";

    $go = new controller();
    $tanggal = date('Y-m-d');
    $tabel = "tbl_pasok";
    $redirect = '?menu=input_pasok';
    @$where = "id_pasok =  $_GET[id]"; 

    if(isset($_POST['simpan'])){
    @$field = array('id_distributor'=>$_POST['distributor'],
                    'id_buku'=>$_POST['IDbuku'],
                    'jumlah'=> $_POST['jumlah'],
                    'tanggal'=> $tanggal);
                    
        $go->simpan($con, $tabel, $field, $redirect);
    }

    if(isset($_GET['hapus'])){
        $go->hapus($con, $tabel, $where, $redirect);
    } 

    if(isset($_GET['edit'])){
        $sql = "SELECT * FROM tbl_pasok
        INNER JOIN tbl_distributor ON tbl_pasok.id_distributor = tbl_distributor.id_distributor INNER JOIN tbl_buku ON tbl_pasok.id_buku = tbl_buku.id_buku            
        WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $edit= mysqli_fetch_assoc($jalan);
    }

    if(isset($_POST['ubah'])){
            $field = array('id_distributor'=>$_POST['distributor'],
            'id_buku'=>$_POST['IDbuku'],
            'jumlah'=> $_POST['jumlah'],
            'tanggal'=> $tanggal);
            $go->ubah($con, $tabel, $field, $where, $redirect);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pasok</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    Form Pasok buku
	    </div>
	    <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Distributor</label>
                    <select name="distributor" class="form-select" required>
                            <option value="<?php echo $edit['id_distributor'] ?>"><?php echo @$edit['nama_distributor'] ?></option>
                            <?php 
                            $distributor = $go->tampil($con,"tbl_distributor");
                            foreach($distributor as $r) {
                            ?>
                            <option value="<?php echo $r['id_distributor'] ?>"><?php echo $r['nama_distributor'] ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ID buku</label>
                    <select name="IDbuku" class="form-select" required>
                            <option value="<?php echo $edit['id_buku'] ?>"><?php echo @$edit['id_buku'] ?></option>
                            <?php 
                            $buku = $go->tampil($con,"tbl_buku");
                            foreach($buku as $r) {
                            ?>
                            <option value="<?php echo $r['id_buku'] ?>"><?php echo $r['id_buku'] ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Jumlah" value="<?php echo @$edit['jumlah']?>" required>
                </div>
                <?php if(@$_GET['id']==""){ ?>
                    <button class="btn btn-primary col-6 mt-4" type="submit" name="simpan" value="SIMPAN">Simpan</button>
                <?php }else{?>
                    <button class="btn btn-primary col-6 mt-4" type="submit" name="ubah" value="UBAH">Ubah</button>
                <?php } ?>
            </form>
	    </div>
    </div>
    <div style="padding:10px;">
        <form class="d-flex">
            <label class="me-3">Pencarian</label>
            <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">Cari</button>
            <button class="btn btn-outline-success" type="submit" href="?menu=input_distri">Refresh</button>
        </form>
        <div class="table-responsive">
        <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
            <tr>
                <th>Distributor</th>
                <th>ID buku</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>hapus</th>
                <th>edit</th>
            </tr>
            <?php
                    $sql = "SELECT * FROM tbl_pasok
                    INNER JOIN tbl_distributor ON tbl_pasok.id_distributor = tbl_distributor.id_distributor INNER JOIN tbl_buku ON tbl_pasok.id_buku = tbl_buku.id_buku";
                    $jalan = mysqli_query($con, $sql);
                    while($r= mysqli_fetch_array($jalan)){
                ?>
            <tr>
                <td><?php echo $r['nama_distributor']?></td>
                <td><?php echo $r['id_buku']?></td>
                <td><?php echo $r['jumlah']?></td>
                <td><?php echo $r['tanggal']?></td>
                <td><a href="?menu=input_pasok&hapus&id=<?php echo $r['id_pasok']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                <td><a href="?menu=input_pasok&edit&id=<?php echo $r['id_pasok']?>">Edit</a></td>
            </tr>
            <?php } ?> 
        </table>
        </div>
    </div>
</div>
    </body>
</html>