<?php

class controller{

    //fungsi login
    function login($con, $tabel, $username, $password, $akses)
    {
        session_start();
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' and password = '$password' AND akses = '$akses'";
        $jalan = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($jalan);
        $data = mysqli_fetch_array($jalan);
        if($cek === 1) {
            if ($data['akses'] == 'admin') {
                $_SESSION['akses'] = $akses;
                $_SESSION['username'] = $username;
                $_SESSION['id']=$data['id_user'];
                echo "<script>alert('Selamat Datang $username');document.location.href='admin.php'</script>";
            }
            elseif ($data['akses'] == 'manager') {
                $_SESSION['akses'] = $akses;
                $_SESSION['username'] = $username;
                $_SESSION['id']=$data['id_user'];
                echo "<script>alert('Selamat Datang $username');document.location.href='manager.php'</script>";
            }
            elseif ($data['akses'] == 'kasir') {
                $_SESSION['akses'] = $akses;
                $_SESSION['username'] = $username;
                $_SESSION['id']=$data['id_user'];
                echo "<script>alert('Selamat Datang $username');document.location.href='kasir.php'</script>";
            }else {
                echo "<script>alert('Gagal Login. Cek Username & Password Anda !');document.location.href='index.php'</script>";
            }
        }
    }
    
    //fungsi simpan
    function simpan($con, $tabel, array $field, $redirect)
    {
        $sql = "INSERT INTO $tabel SET ";
        foreach($field as $key => $value){
            $sql.= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil disimpan');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal disimpan');document.location.href='$redirect'</script>";
        }
    }

    //fungsi tampil
    function tampil($con, $tabel)
    {
        $sql = "SELECT * FROM $tabel";
        $jalan = mysqli_query($con, $sql);
        while($data = mysqli_fetch_assoc($jalan))
            $isi[] = $data;
            return @$isi;
    }

    //fungsi hapus
    function hapus($con, $tabel, $where, $redirect)
    {
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil dihapus');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal dihapus');document.location.href='$redirect'</script>";
        }
    }

    //fungsi edit
    function edit($con, $tabel, $where)
    {
            $sql = "SELECT * FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            $tampung = mysqli_fetch_assoc($jalan);
            return $tampung;
    }

    //fungsi ubah
    function ubah($con, $tabel, array $field, $where, $redirect)
    {
        $sql = "UPDATE $tabel SET ";
        foreach($field as $key => $value){
            $sql.= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql.= " WHERE $where";
        $jalan = mysqli_query($con, $sql);

        if($jalan){
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }

    //fungsi upload file
    function upload($foto, $tempat){
        $alamat = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($alamat, "$tempat/$namafile");
        return $namafile;
    }

}
//penutup class
?>