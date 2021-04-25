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
        rincian($conn, $username, $jumlah, $pinjam, $bayar, $bunga);
        data($conn, $username, $jumlah, $pinjam, $bayar, $bunga, $deskripsi, $jaminan);
        $log = "INSERT INTO log (username, pinjam, bayar, status, status_approve) SELECT * FROM admin_approve Where username = '$username'";
        $sendlog = mysqli_query($conn, $log);
    }else{
        header('Location: ../Views/homepage.php');
    }
?>