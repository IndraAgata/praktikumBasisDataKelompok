<?php
    include("../php/db.con.php");
    include("../php/session.php");
    $tampil = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$user' AND id = '$id'");
    $data = mysqli_fetch_array($tampil)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mx-5 justify-content-center ">
            <div class="row">
                <div class="col-lg8-2">
                    <a href=""><p class="tab mx-2">Home</p></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row px-3">
                    <div class="col-ms-2">
                        <img class="img-fluid" src="../img/undraw_Hiking_re_k0bc.svg" alt="Logo">
                    </div>
                    <div class="col-lg-2">
                        <h1 class="judul">Koperasi</h1>
                        <h4 class="judul-user"><?=$data['username']?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mx-5">
                <a href="../php/logout.php"><h4 class="logout">Logout</h4></a>
                
            </div>
        </div>
        <section class="Form my-4 mx-5">
            <div class="container main">
                <div class="row px-5 py-2">
                    <a href="Rincian Pinjam.php"><button class="btn2">Rincian Pinjam</button></a>
                </div>
                <div class="row no-gutters justify-content-center">  
                    <div class="col-lg-5">
                        <img class="image" src="../img/undraw_online_payments_luau.svg" alt="Pinjam">                       
                    </div>
                    <div class="col-lg-5">
                        <img class="image" src="../img/undraw_Mobile_pay_re_sjb8.svg" alt="Bayar">
                    </div>
                    <div class="row p-5">
                        <div class="col">
                            <a href="Form Pinjam.php"><button class="btn1">Pinjam</button></a>
                        </div>
                        <div class="col">
                            <a href="Form Pengembalian.php"><button class="btn1">Bayar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>