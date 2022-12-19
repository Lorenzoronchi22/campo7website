<?php
include('connection.php');
session_start();

if(isset($_POST['registra'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $user_type = "user";

  $search_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

  if(mysqli_num_rows($search_user) > 0){
    $message[] = 'Attenzione utente già registrato!';
  }else{
    if($pass != $cpass){
      $message[] = 'Attenzione le due password devono coincidere!';
    }else{
      $hash_pass = password_hash($cpass, PASSWORD_DEFAULT);
      mysqli_query($conn, "INSERT INTO `users`(username, email, password, user_type) VALUES('$username', '$email', '$hash_pass', '$user_type')") or die('Errore!');
      $message[] = 'Registrazione avvenuta con successo!';
      header('location:login.php');
    }
  }

}
?>

<!doctype html>
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
    <title>Registrati</title>
  </head>
  <body style="background-image: url('img/backlogreg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
  <?php include 'message.php'; ?>
  <div class="container">
  <div class="registerlogin">
    <h3 class="formtitle">Registrati</h3>
    <form action="" method="post">
      <div class="row">
        <div class="col">
          <input type="text" placeholder="username" name="username" class="forminput">
        </div>
      </div>
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
          <input type="password" placeholder="password di conferma" name="cpassword" class="forminput">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <input type="submit" style="width: 100%;" class="btn btn-secondary" name="registra" value="Registrati">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p class="registerp">Hai già un account? <a href="login.php" class="navbarlink">Login</a></p>
        </div>
      </div>
      </form>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>