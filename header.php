<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/mycss.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                       <li class="nav-item active">
                        <a class="nav-link colink" href="login.php">Home <span class="sr-only">(current)</span></a>
                      </li>
                    </ul>
                    <?php
                        if (session_start()) {
                            echo '<ul class="navbar-nav ml-md-auto">
                                  <form action="includes/logout.inc.php" method="post">
                                    <button type="submit" class="btn">Logout</button>
                                  </form>
                                </ul>';
                        }
                    ?>
                </div>     
            </nav>
        </header>
    </body>
</html>