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
    <link rel="stylesheet" href="../css/approve.css">
    <title>Home Admin</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mx-5 justify-content-center ">
            <div class="row">
                <div class="col-lg8-2">
                    <p class="tab mx-2">Home Admin</p>
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
                    <div class="container align-justify-content-center">
                        <div class="table-responsive-md">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th class="rowspan" rowspan="2">Nama</th>
                                    <th colspan="2">Tanggal</th>
                                    <th class="rowspan" rowspan="2">Status</th>
                                    
                                </tr>
                                <tr>
                                    <th>Pinjam</th>
                                    <th>Bayar</th>
                                </tr>
                                </thead>
                                <?php
                                    $no = 1;
                                    $tampil = mysqli_query($conn, "SELECT * FROM data_pinjam INNER JOIN approval ON data_pinjam.username = approval.username ORDER BY tanggalpinjam ASC");
                                    while ($sql = mysqli_fetch_array($tampil)):
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $sql['Nama'];?></td>
                                        <td><?php echo $sql['tanggalpinjam'];?></td>
                                        <td><?php echo $sql['tanggalbayar'];?></td>
                                        <td><?php echo $sql['status_approve'];?></td>
                                        <td>
                                            <a href="approve.php?hal=detail&name=<?=$sql['Nama']?>"><button class="btn btn-primary btn-sm">detail</button></a>
                                        </td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                    <div class="row p-5">
                        <div class="col">
                            <a href="homepage.php"><button class="btn1">Kembali</button></a>
                        </div>
                    </div>
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