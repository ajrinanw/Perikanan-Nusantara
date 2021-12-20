<?php

    include_once('../config.php');

    session_start();
    if(isset($_SESSION["user"])) {
        header("Location: ../index2.php");
    } else {
        if(isset($_POST['login'])) {
            $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            
            $query = "SELECT * FROM user WHERE username=:username";
            $stmt = $db->prepare($query);

            $params = array(
                ":username" => $username
            );

            $stmt->execute($params);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user != null) {
                if($password == $user['pass']) {

                    session_start();
                    $_SESSION["user"] = $user;
                    header("Location: ../index2.php");

                    if($user['role'] == "karyawan") {
                      header("Location: ../");

                    } else {
                      header("Location: login_admin.php");
                    }

                } else {
                    echo "pass salah";
                }
            } else {
                echo "username salah";
            }

        }
    }
    

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/img/logo_bulat.png" type="image/png" sizes="16x16" />
    <title>Login Perikanan Indonesia</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  </head>
  <body>
    <div class="registration-form">
      <form action="" method="POST">
        <div class="form-icon">
          <img src="../assets/img/logo_bulat.png">
        </div>
        <div class="logintext">
          <h3>Login</h3>
        </div>
        <div class="form-input">
          <input name="email" type="text" class="form-control item" id="email" placeholder="Username" />
        </div>
        <div class="form-input">
          <input name="password" type="password" class="form-control item" id="password" placeholder="Password" />
          <span class="p-view">
            <input type="checkbox" class="check" onclick="myFunction()">
            <script>
                function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type == "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        </span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block login" name="login" id="login"> Login </button>>
        </div>
        <a href="../index2.php" style="color: white", >Home</a>
        <a href="login_admin.php"  style="color: white">Login As Admin</a>
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
