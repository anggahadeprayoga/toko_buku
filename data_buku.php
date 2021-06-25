<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_buku";
@$field = array('id_buku'=>$_POST['kode_buku'],'judul'=>$_POST['judul_buku'], 'noisbn'=>$_POST['isbn'], 'penulis'=>$_POST['penulis'], 'penerbit'=>$_POST['penerbit'], 'tahun'=>$_POST['tahun_terbit'], 'stok'=>$_POST['stok'], 'harga_pokok'=>$_POST['harga_pokok'], 'harga_jual'=>$_POST['harga_jual'], 'diskon'=>$_POST['diskon']);
$redirect = "?menu=input_buku";
@$where = "id_buku = $_GET[id]";

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
    <title>Data Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    LAPORAN SEMUA BUKU
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <form class="d-flex">
                    <button class="btn btn-primary me-2" type="submit">Cetak</button>
                    <button class="btn btn-outline-success" type="submit">Export Excel</button>
                </form>
                <div class="table-responsive">
                    <table align="center" border="1" class="mt-4 table table-strippedable-hover bg-white" id="data">
                        <tr>
                            <th>No.</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>NO ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Stok</th>
                            <th>Harga Pokok</th>
                            <th>Harga Jual</th>
                            <th>PPN</th>
                            <th>Diskon</th>
                        </tr>
                    <?php
                    $data = $go->tampil($con,$tabel);
                    $no = 0;
                    if($data ==""){
                        echo "<tr>
                        <td colspan='5'>No Record</td></tr>";
                    }else{
                        foreach($data as $r){
                        $no++
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $r['id_buku']?></td>
                        <td><?php echo $r['judul']?></td>
                        <td><?php echo $r['noisbn']?></td>
                        <td><?php echo $r['penulis']?></td>
                        <td><?php echo $r['penerbit']?></td>
                        <td><?php echo $r['tahun']?></td>
                        <td><?php echo $r['stok']?></td>
                        <td><?php echo $r['harga_pokok']?></td>
                        <td><?php echo $r['harga_jual']?></td>
                        <td>15%</td>
                        <td><?php echo $r['diskon']?>%</td>
                    </tr>
                    <?php } } ?>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>