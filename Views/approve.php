<?php
    include("../php/db.con.php");
    include("../php/session.php");
    $tampil = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND id = '$id'");
    $data = mysqli_fetch_array($tampil)
?>

<?php
    if (isset($_GET['hal'])){
        if ($_GET['hal'] == "approve") {
            //data akan di approve
            $approve = mysqli_query($conn, "UPDATE approval set status_approve = 'Approved' WHERE username = '$_GET[id]'");
            if ($approve) {//Jika approve sukses
                //Cek log
                $cek = mysqli_query($conn,"SELECT * FROM log");
                $log = mysqli_fetch_array($cek);
                if ($log == 0) {
                    $log = mysqli_query($conn, "INSERT INTO log (username, tanggalpinjam, tanggalbayar, status, status_approve) SELECT * FROM admin_approve");
                }else{
                    $log = mysqli_query($conn, "UPDATE log SET status_approve = 'Approved' WHERE username = '$_GET[id]'");
                }
                echo "<script>
                            alert('Approve data sukses!'); 
                            document.location='admin.php';
                        </script>";
            }else{//Jika approve Gagal
                echo "<script>
                            alert('Approve data GAGAL!! ^_^'); 
                            document.location='approve.php';
                        </script>";
                }    
        }elseif ($_GET['hal'] =="deny") {
            $approve = mysqli_query($conn, "UPDATE approval set status_approve = 'Deny' WHERE username = '$_GET[id]'");
            if ($approve) {//Jika approve sukses
                //Cel log
                $cek = mysqli_query($conn,"SELECT * FROM log");
                $log = mysqli_fetch_array($cek);
                if ($log == 0) {
                    $log = mysqli_query($conn, "INSERT INTO log (username, tanggalpinjam, tanggalbayar, status, status_approve) SELECT * FROM admin_approve");
                }else {
                    $log = mysqli_query($conn, "UPDATE log SET status_approve = 'Deny' WHERE username = '$_GET[id]'");
                }
                echo "<script>
                        alert('Deny data sukses!'); 
                        document.location='admin.php';
                    </script>";
            }else{//Jika approve Gagal
            echo "<script>
                        alert('Deny data GAGAL!! ^_^'); 
                        document.location='approve.php';
                    </script>";
            }
        }
    }
        
?>

<?php
    //Pengujian tombol detail di klik
    if (isset($_GET['hal'])) {
        //Pengujian jika detail data
        if ($_GET['hal'] == "detail") {
            //tampilkan data 
            $display = mysqli_query($conn, "SELECT rincian_pinjam.username, data_pinjam.Nama, rincian_pinjam.tanggalpinjam, rincian_pinjam.tanggalbayar, rincian_pinjam.jumlah, rincian_pinjam.bunga, rincian_pinjam.total FROM rincian_pinjam Inner Join data_pinjam On rincian_pinjam.username = data_pinjam.username WHERE data_pinjam.username = '$_GET[name]';");
            $rincian = mysqli_fetch_array($display);
            if ($rincian == 0) {
                echo "<script>
                        alert('Data sudah dihapus. Ini hanya log!'); 
                        document.location='admin.php';
                    </script>";
            }
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/approve.css">
    <title>Rincian Pinjaman</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mx-5 justify-content-center ">
            <div class="row">
                <div class="col-lg8-2">
                    <p class="tab mx-2">Rincian Pinjaman</p>
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
                <div class="main row no-gutters justify-content-center">
                    <form action="" method="post"></form>
                        <div class="col-lg-5 mx-4 mt-3">
                            <h5 class="judul-user">Data Diri</h5> 
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" value="<?php echo $rincian['username'];?>" name="username" placeholder="Username" disabled readonly>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" value="<?php echo $rincian['Nama'];?>"name="nama" placeholder="Nama" disabled readonly>
                                </div>
                            </div>                      
                        </div>
                        <div class="col-lg-5 mx-4 mt-3">
                            <h5 class="judul-user">Data Peminjam Dana</h5>   
                            <div class="row mt-3 justify-content-center">
                                <label for="tglpinjam">Tanggal Pinjam</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control"  type="date" value="<?php echo $rincian['tanggalpinjam'];?>" name="tglpinjam" disabled readonly>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <label for="tglbayar">Batas Pembayaran</label>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-8">
                                    <input class="form-control"  type="date" value="<?php echo $rincian['tanggalbayar'];?>" name="tglbayar" disabled readonly>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-7 mt-3">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" value="<?php echo $rincian['jumlah'];?>" type="text" name="jumlah" placeholder="Jumlah Dana" disabled readonly>
                                    
                                </div>
                                <div class="col-lg-4 mx-3 mt-3">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" value="<?php echo $rincian['bunga'];?>"name="bunga" placeholder="Bunga" disabled readonly>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-10 mt-3">
                                    <input class="form-control" type="text" value="<?php echo $rincian['total'];?>" name="total" placeholder="Total Bayar" disabled readonly>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-ms-2 mt-4">
                                    <a href="approve.php?hal=approve&id=<?=$rincian['username']?>"><button class="approve" name="approve">Approve</button></a>
                                </div>
                                <div class="col-ms-2 mt-4">
                                    <a href="approve.php?hal=deny&id=<?=$rincian['username']?>"><button class="deny" name="deny">Deny</button></a>
                                </div>
                            </div>      
                        </div>
                        <div class="row p-5">
                            <div class="col">
                                <a href="admin.php"><button class="btn1">Kembali</button></a>
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