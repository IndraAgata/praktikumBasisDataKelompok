<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Login</title>
</head>
<body>
    <h1 class="judul">Koperasi</h1>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img class="position-absolute login my-5" src="../Img/undraw_in_the_office_o44c.svg" alt="login">
                </div>
                <div class="col-lg-7 px-5 pt-5 login-back">
                    <h1 class="font-weight-bold judul-login" style="color: #293158">Login</h1>
                    <br>
                    <form action="../php/login.inc.php" method="post">
                        <div class="form-row justify-content-center">
                            <div class="col-lg-7">
                                <input class="form-control my-3  p-4" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-lg-7">
                                <input class="form-control my-3 mx-auto p-4" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        
                        <div class="form-row justify-content-center">
                            <div class="col-lg-7">
                                <button type="submit" name="submit" class="btn1 mt-3 mb-3">Login</button>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-lg-7">
                                <a href="sign-up.php"><button type="button" name="register" class="btn1 mb-5">Register</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        
    </section>
    
</body>
</html>