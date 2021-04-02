<?php
    if (isset($_POST['submit'])) {
        require_once "db.con.php";
        //data akan di simpan baru
        $simpan = mysqli_query($conn, "INSERT INTO data_pinjamform (Username, `JumlahPinjaman`, `TanggaPinjam`, `TanggalKembali`, `Bunga`, `DeskripsiPinjam`, `Jaminan`) 
        VALUES ('$_POST[user]','$_POST[jumlah]','$_POST[tglpinjam]', '$_POST[tglbayar]', '$_POST[bunga]','$_POST[deskripsi]','$_POST[jaminan]')");
        if ($simpan) {//Jika Simpan sukses
            echo "<script>
                    alert('Simpan data sukses!'); 
                    document.location='../Views/homepage.php';
                  </script>";
        }else{//Jika simpan Gagal
            echo "<script>
                    alert('Simpan data GAGAL!! 😮😥'); 
                    document.location='../Views/Form Pinjam.php';
                    </script>";
        }
    }
?>