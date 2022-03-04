<?php
//inisialisasi session
session_start();
 
//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
 
    require 'koneksi.php';
    require 'style.php';
    $tampil = query ("SELECT * FROM tb_profil");
    $id=1;
    $no=1;
    //update nama
    $tb_profile = ("SELECT * FROM tb_profil where id = $id")[0];


    if(isset($_POST['submit'])){

        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil diupdate!');
                    document.location.href='input.php';
                </script>
            ";
        }
    } else {
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
#wrapper {
     width: 250px;    
    }
</style>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
    <div class="container">
        <a href="index.php" class="navbar-brand">HOME</a>
        <button class="navbar-toggler" type="button" data-togle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-auto pt-2 pb-2">
            <li class="nav-item">
                <a href="history.php" class="nav-link text-light">History Logs</a>
            </li>
            <li class="nav-item ml-4">
                <a href="input.php" class="nav-link text-light">Input User</a>
            </li>
            <li class="nav-item ml-4">
                <a href="logout.php" class="nav-link text-light"> Log Out </a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron jumbotron-fluid bg-light" style="height:90vh">
  <div class="container">
    <form method='POST' enctype="multipart/form-data">   
    <table class="table table-hover">

        <tr>
            <th>Uid</th>
            <th><input type="text" id="wrapper" class="form-control" name="uid" placeholder="Masukkan Uid"></th>
        </tr>
        <tr>
            <th>Nama</th>
            <th><input type="text" id="wrapper" class="form-control" name="nama" placeholder="Masukkan Nama"></th>
        </tr>
        <tr>
            <th>Sekolah</th>
            <th><input type="text" id="wrapper" class="form-control" name="sekolah" placeholder="Masukkan Sekolah"></th>
        </tr>

    </table>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
</form>
    

<table id="tabel-data" width="100%">
    <button type="button" onclick="reload_table()" class="btn btn-primary">Reload</button>
    <thead>
        <tr>
            <th>UID</th>
            <th>NAMA</th>
            <th>SEKOLAH</th>
            <th>Aksi</th>
            
        </tr>
    </thead>
    <tbody>
    
    </tbody>

</table>
<script>
        $(document).ready( function () {
            table = $('#tabel-data').DataTable({  
            "processing": true, 
            "responsive": true,
            "ajax": {
                "url": "http://localhost:8080/absensi_ol/api-ajax.php",
                "type": "GET",
            },
            "columns": [

              { "data": "uid" },  
              { "data": "nama" },  
              { "data": "sekolah" }, 
              { "data": "aksi" }, 

            ],
          }); 
        });

        function reload_table()
        {
            table.ajax.reload(null,false);  
        }

        
    </script>
</body>

</html>
