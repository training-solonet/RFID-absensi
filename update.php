<?php


    require "koneksi.php";
    require "style.php";

    $id = $_GET["id"];
    $tb_profil = query("SELECT * FROM tb_profil WHERE id = $id")[0];
    

    if(isset($_POST['submit'])){


        if(update($_POST) > 0){
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
            <form method='POST'>
            <input type="hidden" name="id" value="<?php echo $tb_profil["id"]; ?>">
        <tr>
            <th>Uid</th>
            <th><input type="text" id="wrapper" class="form-control" name="uid" readonly value="<?php echo $tb_profil["uid"]; ?>  "></th>
        </tr>
        <tr>
            <th>Nama</th>
            <th><input type="text" id="wrapper" class="form-control" name="nama" value="<?php echo $tb_profil["nama"]; ?> "></th>
        </tr>
        <tr>
            <th>Sekolah</th>
            <th><input type="text" id="wrapper" class="form-control" name="sekolah" value="<?php echo $tb_profil["sekolah"]; ?> "></th>
        </tr>

    </table>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
</form>
    
</table>
</body>
</html>