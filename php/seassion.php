<?php 

session_start();

// cek session, kalo gak ada kembali ke login
if( !isset($_SESSION['login-submit']) ){
    header("Location:../Views/login.php");
    exit;
}

// ambil data user
$user = [
    "username" => $_SESSION['username'],
];