<?php
    include("../php/db.con.php");
    include("../php/session.php");
    $user= $_SESSION['id'];
    $tampil = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$user'");
    $data = mysqli_fetch_array($tampil)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes</title>
</head>
<body>

        <?
            echo $_SESSION['username'];
        ?>
        <table>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>username</th>
                <th>password</th>
                <th>Tipe User</th>
            </tr>
            <?php
                $no=1;
                
            ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['id']?></td>
                    <td><?=$data['username']?></td>
                    <td><?=$data['password']?></td>
                    <td><?=$data['tipe_user']?></td>
                </tr>
            
        </table>
</body>
</html>