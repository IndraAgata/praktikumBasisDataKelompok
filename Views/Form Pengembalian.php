<?php
    include("../php/db.con.php");
    include("../php/session.php");
    $tampil = mysqli_query($conn, "SELECT username, concat(firstname, ' ', lastname) AS Nama FROM data_pengguna WHERE username = '$user'");
    $data = mysqli_fetch_array($tampil);
?>
<?php
    $display = mysqli_query($conn, "SELECT * FROM rincian_pinjam WHERE username = '$user'");
    $rincian = mysqli_fetch_array($display);
    if (isset($_POST['bayar'])) {
        $sql = "UPDATE data_pinjam SET status = 'Lunas', tanggalbayar = '$_POST[pay]' Where username = '$user'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $hapus = "DELETE FROM data_form WHERE username = '$user'";
            $delete = mysqli_query($conn, $hapus);
            if ($delete) {
                $rincian = "DELETE FROM rincian_pinjam WHERE username = '$user'";
                $delrincian = mysqli_query($conn, $rincian);
                if ($delrincian) {
                    $pinjam = "DELETE FROM data_pinjam WHERE username = '$user'";
                    $delpinjam = mysqli_query($conn, $pinjam);
                    if ($delpinjam) {
                        $approve = "DELETE FROM approval WHERE username = '$user'";
                        $delapprove = mysqli_query($conn, $approve);
                        if ($rincian) {//Jika Bayar sukses
                            echo "<script> 
                                    document.location='homepage.php';
                                </script>";
                        }else{//Jika Bayar Gagal
                            echo "<script>
                                    alert('Pembayaran GAGAL!! ^_^'); 
                                    document.location='homepage.php';
                                </script>";
                        }
                    }
                }
            }
        }
    }elseif (isset($_POST['batal'])) {
        header('Location: ../Views/homepage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/pengembalian.css">
    <title>Form Pengembalian</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mx-5 justify-content-center ">
            <div class="row">
                <div class="col-md-10">
                    <p class="tab mx-2">Form Pengembalian</p>
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
                <form action="" method="post">
                    <div class="main row no-gutters justify-content-center">    
                        <div class="col-lg-5 mx-4 mt-3">
                            <h5 class="judul-user">Data Diri</h5> 
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" name="username" value="<?php echo $data['username'];?>" placeholder="Username" disabled readonly>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" name="nama" value="<?php echo $data['Nama'];?>"placeholder="Nama" disabled readonly>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-5 mx-4 mt-3">
                            <h5 class="judul-user">Data Pinjaman Dana</h5>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-7 mt-3">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" value="<?php echo $rincian['jumlah'];?>"name="jumlah" placeholder="Jumlah Dana" disabled readonly>
                                    
                                </div>
                                <div class="col-lg-4 mx-3 mt-3">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" value="<?php echo $rincian['bunga']?>" name="bunga" placeholder="Bunga" disabled readonly>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <label for="tglpinjam">Tanggal Pinjam</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control" value="<?php echo $rincian['tanggalpinjam'];?>" type="date" name="tglpinjam" disabled readonly>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <label for="tglbayar">Batas Pembayaran</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control" value="<?php echo $rincian['tanggalbayar'];?>" type="date" name="batas" disabled readonly>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <label for="tglbayar">Tanggal Pembayaran</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control"  name="pay" type="date" name="tglbayar">
                                </div>
                            </div>              
                        </div>
                        <div class="row p-5">
                            <div class="col">
                                <button class="btn1" name="bayar" type="submit">Submit</button>
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