<?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        require_once 'db.con.php';
        require_once 'function.php';

        if (emptyInputLogin($username, $password)!== false)  {
            header('Location: ../Views/login.php?error=emptyinput');
            exit();
        }
        
        loginUser($conn, $username, $password);
    }
    else {
        header('Location: ../Views/login.php');
        exit();
    }
?>