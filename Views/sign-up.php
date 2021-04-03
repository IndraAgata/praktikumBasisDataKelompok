<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/register.css">
    <title>Register</title>
</head>
<body>
    <h1 class="judul">Register</h1>
    <section class="Form my-4 mx-2">
        <div class="w-50 container align-content-center form-back">
            <div class="row no-gutters">
                <div class="col">
                    <div class="icon mx-3 px-1 py-2">
                        <a href="login.php"><img class="icon2" src="../Img/x-circle (2).svg" alt="x"></a>
                    </div>
                    <h4 class="form-judul mx-5 my-4 px-5">Register Account</h4>
                    <form action="../php/register.php" method="post">
                        <div class="container px-5">
                            <div class="row gx-5 mt-3">
                              <div class="p-3 col">
                                <input class="form-control" type="text" name="fname" placeholder="First Name">
                              </div>
                              <div class="p-3 col">
                                <input class="form-control" type="text" name="lname" placeholder="Last Name">
                              </div>
                              
                            </div>
                            <div class="row gx-5 my-2">
                                <div class="p-3 col">
                                    <input class="form-control" type="text" name="pekerjaan" placeholder="Pekerjaan">
                                </div>
                                 <div class="p-3 mx-4 col-lg-3">
                                     <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" name="umur" placeholder="Umur">
                                 </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="p-3 col-lg-8">
                                    <input class="form-control" type="text" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="p-3 col-lg-8">
                                    <input class="form-control" onkeypress="return onlyNumberKey(event)" type="text" name="nomor" placeholder="Nomor Ponsel">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="p-3 col-lg-8">
                                    <input class="form-control" type="text" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="row justify-content-center ">
                                <div class="p-3 col-lg-8">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-lg-5">
                                <button type="submit" name="register-submit" class="btn1 my-3">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <script> 
        function onlyNumberKey(evt) { 
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
            return true; 
        } 
    </script>
    <script type="text/javascript" src="CSS/bootstrap/js/bootstrap.js"></script>
</body>
</html>