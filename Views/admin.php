<?php
    include("../php/db.con.php");
    include("../php/session.php");
    $tampil = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND id = '$id'");
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
                <div class="main row no-gutters">
                    <div class="row align-self-start">
                        <div class="row px-5 py-2">
                            <a href="admin.php?hal=log"><button class="btn2">Log</button></a>
                        </div>
                        
                        <?php
                        //Tombol atas
                            if (isset($_GET['hal'])) {
                                if ($_GET['hal'] == 'log') {
                                    $sql = mysqli_query($conn, "SELECT * FROM log ORDER BY date(tanggalpinjam) DESC;");
                                    $tampil = mysqli_fetch_array($sql);
                                    echo '<div class="row py-2">
                                            <a href="admin.php"><button class="btn2">Kembali</button></a>
                                            </div>';
                                    if ($tampil >= 1){
                                        echo '<div class="row px-5 py-2">
                                                <a href="admin.php?hal=clear"><button class="btn2">Clear Log</button></a>
                                            </div>';        
                                    }
                                    echo '<div class="row py-2">
                                            <a href="admin.php?hal=cari"><button class="btn2">Group By</button></a>
                                            </div>';
                                }elseif ($_GET['hal'] == 'clear') {
                                    $sql = mysqli_query($conn, "DELETE FROM log");
                                    header('Location: admin.php');
                                }elseif ($_GET['hal'] == 'filter') {
                                    echo '<div class="row py-2">
                                            <a href="admin.php"><button class="btn2">Kembali</button></a>
                                            </div>';
                                    echo '<div class="row px-5 py-2">
                                            <form action="" method="post">    
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="min" placeholder="Input Jumlah" aria-label="Jumlah">
                                                    <span class="input-group-text">To</span>
                                                    <input type="number" class="form-control" name="max" placeholder="Input Jumlah" aria-label="Jumlah">
                                                    <button class="btn btn-outline-secondary" type="submit" name="sort">Filter</button>
                                                </div>
                                            </form>
                                        </div>';
                                }
                            }else {
                                echo '<div class="row py-2">
                                        <a href="admin.php?hal=filter"><button class="btn2">Jumlah</button></a>
                                        </div>';
                                echo '<div class="row px-5 py-2">
                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari" aria-label="Cari" name="user" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" name="search">Cari</button>
                                    </div>
                                </form>
                            </div>';
                            }
                        ?>
                        
                        
                        
                    </div>
                    <?php
                        //Hitung Total
                        $total = mysqli_query($conn, "SELECT Count(*) AS Total FROM admin_approve");
                        $get = mysqli_fetch_assoc($total);
                    ?>
                    <?php
                        if (isset($_GET['hal'])) {
                            # code...
                        }else{
                            echo "<div class='container mx-5 my-2'>
                                        <p>Total :$get[Total]</p>    
                                    </div>";
                        }
                    ?>
                    
                    <div class="container align-justify-content-center">
                        <div class="table-responsive-md">
                            <table class="table table-borderless">
                                <thead>
                                <?php
                                    if (isset($_GET['hal'])){
                                        if ($_GET['hal'] == 'log'){
                                            echo '<tr>
                                                    <th>Username</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th colspan="2">Status</th>      
                                                </tr>';
                                        }elseif ($_GET['hal'] == 'filter') {
                                            echo '<tr>
                                                    <th>Username</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th>Status</th>      
                                                </tr>';
                                        }elseif ($_GET['hal'] == 'cari') {
                                            echo '<tr>
                                                    <th>Total</th>
                                                    <th>Tanggal Pinjam</th>      
                                                </tr>';
                                        }elseif (isset($_POST['sort'])) {
                                            echo '<tr>
                                                        <th>Username</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal Bayar</th>
                                                        <th>Tanggal Bayar</th>
                                                        <th>Status</th>      
                                                    </tr>';
                                        }
                                    }elseif (isset($_POST['search'])) {
                                        echo '<tr>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Bayar</th>
                                                <th colspan="2">Status</th>      
                                            </tr>';
                                    }else{
                                        echo '<tr>
                                                    <th>Username</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th colspan="2">Status</th>      
                                                </tr>';
                                    }
                                ?>
                                </thead>
                                <?php
                                    if (isset($_GET['hal'])) {
                                        if ($_GET['hal'] == "log") {
                                            $tampil = mysqli_query($conn, "SELECT * FROM log ORDER BY date(tanggalpinjam) DESC;");
                                        }elseif($_GET['hal'] == "filter") {
                                            //Filter
                                            if (isset($_POST['sort'])) {
                                                if ($_POST['min'] && $_POST['max']) {
                                                    $tampil = mysqli_query($conn, "SELECT * FROM `data_pinjam` WHERE jumlah BETWEEN $_POST[min] and $_POST[max]");
                                                }elseif ($_POST['max']) {
                                                    $tampil = mysqli_query($conn, "SELECT * FROM `data_pinjam` WHERE jumlah = $_POST[max]");
                                                }elseif ($_POST['min']) {
                                                    $tampil = mysqli_query($conn, "SELECT * FROM `data_pinjam` WHERE jumlah = $_POST[min]");
                                                }
                                            }else {
                                                $tampil = mysqli_query($conn, "SELECT * FROM data_pinjam ORDER BY date(tanggalpinjam) DESC;");
                                            }
                                        }elseif ($_GET['hal'] == 'cari'){
                                            $tampil = mysqli_query($conn, "SELECT COUNT(id) AS Total, tanggalpinjam FROM log GROUP BY tanggalpinjam;");
                                        }
                                    }elseif (isset($_POST['search'])) {
                                        if ($_POST['user'] == NULL) {
                                            echo "<script>
                                                        alert('Pencarian Kosong!'); 
                                                        document.location='../Views/admin.php';
                                                </script>";
                                        }
                                        $tampil = mysqli_query($conn, "SELECT * FROM data_pinjam WHERE Nama LIKE '%$_POST[user]%'");
                                    }else {
                                        $tampil = mysqli_query($conn, "SELECT * FROM admin_approve");
                                    }
                                    while ($sql = mysqli_fetch_array($tampil)):
                                ?>
                                <tbody>
                                    <tr>
                                        <?php
                                            if (isset($_GET['hal'])) {
                                                //Tampil Tabel
                                                if ($_GET['hal'] == 'filter'){
                                                    echo "<td>$sql[username]</td>
                                                    <td>$sql[jumlah]</td>
                                                    <td>$sql[tanggalpinjam]</td>
                                                    <td>$sql[tanggalbayar]</td>
                                                    <td>$sql[status]</td>";
                                                }elseif ($_GET['hal'] == 'log') {
                                                    echo "<td>$sql[username]</td>
                                                            <td>$sql[tanggalpinjam]</td>
                                                            <td>$sql[tanggalbayar]</td>
                                                            <td>$sql[status_approve]</td>
                                                            <td>$sql[status]</td>";
                                                }elseif ($_GET['hal'] == 'cari') {
                                                    echo "<td>$sql[Total]</td>
                                                            <td>$sql[tanggalpinjam]</td>";
                                                }
                                            }elseif (isset($_POST['sort'])) {
                                                echo "<td>$sql[username]</td>
                                                    <td>$sql[jumlah]</td>
                                                    <td>$sql[tanggalpinjam]</td>
                                                    <td>$sql[tanggalbayar]</td>
                                                    <td>$sql[status]</td>";
                                            }elseif (isset($_POST['search'])) {
                                                echo "<td>$sql[username]</td>
                                                <td>$sql[Nama]</td>
                                                <td>$sql[jumlah]</td>
                                                <td>$sql[tanggalpinjam]</td>
                                                <td>$sql[tanggalbayar]</td>
                                                <td>$sql[status]</td>";
                                            } else {
                                                echo "<td>$sql[username]</td>
                                                <td>$sql[tanggalpinjam]</td>
                                                <td>$sql[tanggalbayar]</td>
                                                <td>$sql[status_approve]</td>
                                                <td>$sql[status]</td>";
                                            }
                                        ?>
                                        
                                        <td>
                                            <?php
                                                //Tombol detail
                                                if (isset($_GET['hal'])) {
                                                    if ($_GET['hal'] == 'log'){
                                                               
                                                    }elseif ($_GET['hal'] == 'filter') {
                                                        echo "<a href='approve.php?hal=detail&name=$sql[username]'><button class='btn btn-primary btn-sm'>detail</button></a>";
                                                    }
                                                }elseif (isset($_POST['sort'])) {
                                                    echo "<a href='approve.php?hal=detail&name=$sql[username]'><button class='btn btn-primary btn-sm'>detail</button></a>";
                                                }elseif (isset($_POST['search'])) {
                                                    echo "<a href='approve.php?hal=detail&name=$sql[username]'><button class='btn btn-primary btn-sm'>detail</button></a>";
                                                }else{
                                                    echo "<a href='approve.php?hal=detail&name=$sql[username]'><button class='btn btn-primary btn-sm'>detail</button></a>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>
                               
                            </table>
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