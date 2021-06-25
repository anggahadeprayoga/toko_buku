<?php 
session_start();
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();

$redirect = "?menu=ubah_pass";
$tabel = "tbl_user";
@$username = $_SESSION['username'];
@$pass = $_POST['password'];
$data = $go->tampil($con, $tabel);
$sql = "SELECT * FROM tbl_user WHERE username = '$username' ";
$tampil = mysqli_fetch_assoc(mysqli_query($con,$sql));


if(isset($_POST['ubah'])){
  $sql = "UPDATE tbl_user SET password = '$pass'  WHERE username = '$username'";
  $query = mysqli_query($con,$sql);
  if(isset($query)){
    echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
  }else{
    echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
}
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		   FORM UBAH PASSWORD AKUN ADMIN
	    </div>
	    <div class="card-body">
            <form method="post">
                <div class="container w-75 mt-3 pt-3">
                    <div class="mb-2" data-aos="fade-up" data-aos-delay="100">
                      <label class="form-label h6">Username :</label>
                      <input type="text" class="form-control" name="user" value="<?php echo @$tampil['username'] ?>" required readonly>
                    </div>
                    <div class="mb-2" data-aos="fade-up" data-aos-delay="200">
                    <label class="form-label h6">Password lama :</label>
                    <input type="text"  class="form-control" name="passlama" value="<?php echo @$tampil['password'] ?>" readonly>
                    </div>
                    <div class="mb-2" data-aos="fade-up" data-aos-delay="200">
                    <label class="form-label h6">Password Baru :</label>
                    <input type="text"  class="form-control" name="password" required>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                      <input class="btn btn-dark text-light" type="submit" name="ubah" value="ubah">
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>
</body>
</html>        
            
            
