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
    <link rel="stylesheet" href="../assets/css/login_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  </head>
  <body>
    <div class="registration-form">
      <form method="post" action="/login_biasa">
        <div class="form-icon">
          <img src="../assets/img/logo_bulat.png">
        </div>
        <div class="logintext">
          <h3>Login Admin</h3>
        </div>
        <div class="form-input">
          <input name="email" type="text" class="form-control item" id="email" placeholder="Email" />
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
          <button type="submit" class="btn btn-block login">Login</button>
        </div>
        <a href="index2.php" style="color: white", >Home</a>
        <a href="login.php"  style="color: white">Back</a>
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
