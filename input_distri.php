<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_distributor";
@$field = array('nama_distributor'=>$_POST['nama'], 'alamat'=>$_POST['alamat'], 'telpon'=>$_POST['telp']);
$redirect = "?menu=input_distri";
@$where = "id_distributor = $_GET[id]";

if (isset($_POST['simpan'])) {

    $go->simpan($con, $tabel, $field, $redirect);
}
if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}
if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $tabel, $where);
}
if (isset($_POST['ubah'])) {
    $go->ubah($con, $tabel, $field, $where, $redirect);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Distributor</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    Form Distributor
	    </div>
	    <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Distributor</label>
                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Distributor" value="<?php echo @$edit['nama_distributor']?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['alamat']?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Telpon</label>
                    <input type="number" name="telp" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Telpon" value="<?php echo @$edit['telpon']?>" required>
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
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th>hapus</th>
                <th>edit</th>
            </tr>
            <?php
                    $sql = "SELECT * FROM tbl_distributor";
                    $jalan = mysqli_query($con, $sql);
                    while($r= mysqli_fetch_array($jalan)){
                ?>
            <tr>
                <td><?php echo $r['nama_distributor']?></td>
                <td><?php echo $r['alamat']?></td>
                <td><?php echo $r['telpon']?></td>
                <td><a href="?menu=input_distri&hapus&id=<?php echo $r['id_distributor']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                <td><a href="?menu=input_distri&edit&id=<?php echo $r['id_distributor']?>">Edit</a></td>
            </tr>
            <?php } ?> 
        </table>
        </div>
    </div>
</div>
    </body>
</html>