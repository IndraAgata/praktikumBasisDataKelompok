<?php
    
    if(isset($_POST['register-submit'])){
        include "con-user.php";
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $job = $_POST['pekerjaan'];
        $umur = $_POST['umur'];
        $email = $_POST['email'];
        $telepon = $_POST['nomor'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($firstname) || empty($lastname) || empty($job) || empty($umur) || empty($email) || empty($telepon) || empty($username) || empty($password)){
            header('Location: ../Views/register.html?error=emptyfields&user='.$username.'&email='.$email);
        }
    }
?>