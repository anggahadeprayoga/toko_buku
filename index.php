<?php
    include "config/koneksi.php";
    include "library/controller.php";
    
    $tabel = 'tbl_user';
    @$username = $_POST['user'];
    @$password = $_POST['pass'];
	@$akses = $_POST['akses'];
    
    $go = new controller();

    if (isset($_POST['login'])) {
        $go->login($con, $tabel, $username, $password, $akses);
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <title>Login</title>
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form class="border shadow p-3 rounded" style="width: 450px;" method="post">
                <h1 class="text-center p-3">Login</h1>

                <div class="form-floating mb-2">
                <input type="text" name="user" class="form-control" id="floatingUsername" placeholder="Username" required>
                <label for="floatingUsername">Username :</label>
                </div>
                <div class="form-floating mb-3">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password :</label>
                </div>

				<select class="form-select mb-3" name="akses" required>
                <option></option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
		  </select>
		 
		  <button type="submit" class="w-100 btn btn-primary" name="login" value="LOGIN">LOGIN</button>
        </main>
    </div>
</body>
</html>