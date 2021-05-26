<?php
    $sql = mysqli_query($conn, "Select Jumlah From Data_form Where userid"); 
    if($sql['Jumlah'] <= 5000000){
        $bunga = 20;
        //Between
    }elseif ($sql['Jumlah'] > 5000000 && $sql['Jumlah'] < 10000000) {
        $bunga = 40;
    }else{
        echo "Tidak Bisa Minjam";
        header("Location: homepage.php");
    }
    $insert = mysqli_query($conn, "INSERT INTO rincian_pinjam (Bunga) Value ($bunga)");

    $sql = mysqli_query($conn, "SELECT* FROM rincian_data Where id = 1");
    
?>


Select Jumlah database;
if


