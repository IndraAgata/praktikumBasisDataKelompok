<?php
    if (isset($_POST['submit-form'])) {
        require_once "db.con.php";
        require_once "function.php";

        $username = $_POST['username'];
        $jumlah = $_POST['jumlah'];
        $pinjam = $_POST['tglpinjam'];
        $bayar = $_POST['tglbayar'];
        $bunga = $_POST['bunga'];
        $deskripsi = $_POST['deskripsi'];
        $jaminan = $_POST['jaminan'];
        $nama = $_POST['nama'];
        $status = "Belum Lunas";
        //data akan di simpan baru
        pinjam($conn, $username, $nama, $jumlah, $pinjam, $bayar, $status);
        approve($conn, $username);
        $sql = "INSERT INTO log (username, tanggalpinjam, tanggalbayar, status, status_approve) SELECT * FROM admin_approve Where username = '$username'";
        $log =mysqli_query($conn, $sql);
        rincian($conn, $username, $jumlah, $pinjam, $bayar, $bunga);
        data($conn, $username, $jumlah, $pinjam, $bayar, $bunga, $deskripsi, $jaminan);
         
    }else{
        header('Location: ../Views/homepage.php');
    }
?>