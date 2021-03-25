<?php
    include "db.con.php";
    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $user = validate($_POST['username']);
        $pwd = validate($_POST['password']);
        

        if (empty($user) && empty($pwd)) {
            header("Location: ../index.php?error=username & password required");
            exit();
        }else if(empty($user)){
            header("Location: ../index.php?error=user name is required");
            exit();
        }elseif (empty($pwd)) {
            header("Location: ../index.php?error=password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM pengguna WHERE username='$user' AND password='$pwd'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $user && $row['password'] === $pwd) {
                    if ($row['tipe_user'] === 'Admin') {
                        session_start();
                        $_SESSION['username'] = $row=['username'];
                        $_SESSION['tipe_user'] = $row=['tipe_user'];
                        header("Location: ../index2.php");
                        exit(); 
                    }elseif($row['tipe_user'] === 'Anggota'){
                        session_start();
                        $_SESSION['username'] = $row=['username'];
                        $_SESSION['tipe_user'] = $row=['tipe_user'];
                        header("Location: ../index2.php");
                        exit();
                    }else{
                        header("Location: ../index.php?error=wrong usertype");
                        exit();
                    }
                }
            }else{
                header("Location: ../index.php?error=incorrect username and password");
                exit();
            }
        }
    }else{
        header("Location: ../index.php?error=no user");
        exit();
    }
?>