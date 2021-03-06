<?php
    if(isset($_POST['register-submit'])){
        //Include php
        require_once "db.con.php";
        require_once "function.php";
        //Input Form Field
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $job = $_POST['pekerjaan'];
        $umur = $_POST['umur'];
        $email = $_POST['email'];
        $telepon = $_POST['nomor'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tipe_user = "Anggota";

        //Conditions untuk handling error
        if (emptyInputSiginup($firstname, $lastname, $job, $umur, $email, $telepon, $username, $password) !== false) {
            header('Location: ../Views/sign-up.php?error=emptyinput');
            exit();
        }
        if (invalidUid($username)) {
            header('Location: ../Views/sign-up.php?error=username');
            exit();
        }
        if (invalidEmail($email)) {
            header('Location: ../Views/sign-up.php?error=email');
            exit();
        }
        if (UidExist($conn, $username, $email) !== false) {
            header('Location: ../Views/sign-up.php?error=usernametaken');
            exit();
        }
        
       
        createUser($conn, $username, $password, $firstname, $lastname, $umur, $email, $telepon, $job, $tipe_user);
        user($conn, $username, $password, $tipe_user);
    }
    else {
        header('Location: ../Views/sign-up.php');
    }
?>
