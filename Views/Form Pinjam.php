<?php
    include("../php/db.con.php");
    include("../php/session.php");
    $tampil = mysqli_query($conn, "SELECT username, concat(firstname, ' ', lastname) AS Nama FROM data_pengguna WHERE username = '$user'");
    $data = mysqli_fetch_array($tampil);
    //Check Apakah sudah meminjam
    $chk = mysqli_query($conn, "SELECT * FROM data_pinjam WHERE username = '$user'");
    $check = mysqli_fetch_array($chk);
    if ($check >= 1) {
        echo "<script>
            alert('Maaf anda sudah meminjam. Anda hanya bisa melakukan pinjaman sekali!'); 
            document.location='../Views/homepage.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/pinjam.css">
    <title>Form Pinjam</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mx-5 justify-content-center ">
            <div class="row">
                <div class="col-lg8-2">
                    <p class="tab mx-2">Form Pinjam</p>
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
                        <h4 class="judul-user"><?php echo $data['username'];?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mx-5">
                <a href="../php/logout.php"><h4 class="logout">Logout</h4></a>
            </div>
        </div>
        <section class="Form my-4 mx-5">
            <div class="container">
                <form action="../php/form-pinjam.php" method="post">
                    <div class="main row no-gutters justify-content-center">    
                        <div class="col-lg-5 mx-4 mt-3">
                            <h5 class="judul-user">Data Diri</h5> 
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" name="username" value="<?php echo $data['username'];?>" placeholder="Username" readonly>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" name="nama" value="<?php echo $data['Nama'];?>" placeholder="Nama" readonly>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-5 mx-4 mt-3">
                            <h5 class="judul-user">Data Pinjaman Dana</h5>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-7 mt-3">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" name="jumlah" placeholder="Jumlah Dana">
                                    
                                </div>
                                <div class="col-lg-4 mx-3 mt-3">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" name="bunga" placeholder="Bunga">
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <label for="tglpinjam">Tanggal Pinjam</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control"  type="date" name="tglpinjam" min="<?php echo date("Y-m-d");?>">
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <label for="tglbayar">Tanggal Bayar</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control"  type="date" name="tglbayar" min="<?php echo date("Y-m-d");?>">
                                </div>
                            </div>
                            <div class="form-row mt-3 justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control"  type="text" name="jaminan" placeholder="Jaminan">
                                </div>
                            </div> 
                            <div class="form-row mt-3 justify-content-center">
                                <div class="col-lg-8">
                                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" aria-label="With textarea"></textarea>
                                </div>
                            </div>                           
                        </div>
                        <div class="row p-5">
                            <div class="col">
                                <button class="btn1" name="submit-form" type="submit">Submit</button>
                            </div>
                            <div class="col">
                                <a href="homepage.php"><button name="batal" class="btn1">Batal</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script> 
        function onlyNumberKey(evt) { 
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
            return true; 
        } 
  </script>
</body>
</html>