<?php 

session_start();

// cek session, kalo gak ada kembali ke login
if( !isset($_SESSION['username']) ){
    header("Location:login.php?error=cannot session");
    exit;
}

// ambil data user

