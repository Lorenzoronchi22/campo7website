<?php

include 'connection.php';
session_start();

if(isset($_POST['login'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die("Errore! L'accesso non è riuscito!");

   if(mysqli_num_rows($select_users) > 0){

    $row = mysqli_fetch_assoc($select_users);

    if(password_verify($pass, $row['password'])){
      if($row['user_type'] == 'admin'){

        $_SESSION['admin_name'] = $row['username'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
        header('location:home.php');
      }     
    }else{
      $message[] = 'Attenzione! Password non corretta!';
    }
  }else{
    $message[] = 'Attenzione! Utente non trovato!';
  }
}

?>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/camposportivo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .col{
        margin: 5px auto;
      }
    </style>
  <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="formlogin">
        <h3 class="formtitle">Login</h3>
        <form action="" method="post">
          <div class="row">
            <div class="col">
              <input type="email" placeholder="email" name="email" class="forminput">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="password" placeholder="password" name="password" class="forminput">
            </div>
          </div>
          <div class="row">
            <div class="col">
            <input type="submit" class="btn btn-secondary" id="login" name="login" value="Login">
            </div>
          </div>
          <div class="row">
          <div class="col">
            <p class="registerp">Non hai un account? <a href="registrati.php" class="navbarlink">Registrati</a></p>
            </div>
          </div>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>