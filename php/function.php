<?php
    function emptyInputSiginup($firstname, $lastname, $job, $umur, $email, $telepon, $username, $password) {
        
        if (empty($firstname) || empty($lastname) || empty($job) || empty($umur) || empty($email) || empty($telepon) || empty($username) || empty($password)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidUid($username) {
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function UidExist($conn, $username, $email) {
        $sql = "SELECT * FROM data_pengguna WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Views/sign-up.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $username, $password, $firstname, $lastname, $umur, $email, $telepon, $job) {
        $sql = "INSERT INTO `data_pengguna`(`username`, `password`, `firstname`, `lastname`, `umur`, `email`, `notlpn`, `pekerjaan`) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Views/sign-up.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssss", $username, $password, $firstname, $lastname, $umur, $email, $telepon, $job);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function user($conn, $username, $password, $tipe_user){
        $sql = "INSERT INTO `pengguna`(`username`, `password`, `tipe_user`)  VALUES(?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Views/sign-up.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $tipe_user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: ../Views/login.php');
    }

    //Login
    function emptyInputLogin($username, $password) {
        
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function login($conn, $username, $password) {
        $sql = "SELECT * FROM pengguna WHERE `username` = ? OR `password` = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Views/login.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function loginUser($conn, $username, $password) {
        $uidExist = login($conn, $username, $password);

        if ($uidExist === false) {
            header('Location: ../Views/login.php?error=wronglogin');
            exit();
        }

        $pas = $uidExist['password'];

        if ($pas !== $password) {
            header('Location: ../Views/login.php?error=wrongpassword');
            exit();
        }
        elseif ($pas == $password) {
            session_start();
            $_SESSION['username'] = $uidExist['username'];
            $_SESSION['id'] = $uidExist['id'];
            header('Location: ../Views/homepage.php');
            exit();
        }
    }

    //Form Pinjaman
    function pinjamform($conn, $username, $jumlah, $pinjam, $bayar, $bunga, $deskripsi, $jaminan){
        $sql = "INSERT INTO data_pinjamform (Username, JumlahPinjaman, TanggaPinjam, TanggalKembali, Bunga, DeskripsiPinjam, Jaminan) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Views/form-pinjam.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssssss", $username, $jumlah, $pinjam, $bayar, $bunga, $deskripsi, $jaminan);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function pinjam($conn, $username, $nama, $jumlah, $pinjam, $bayar, $status){
        $sql = "INSERT INTO data_pinjam (username, Nama, jumlah, tanggalpinjam, tanggalbayar, status)  VALUES(?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Views/form-pinjam.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssss", $username, $nama, $jumlah, $pinjam, $bayar, $status);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: ../Views/homepage.php');
    }
?>