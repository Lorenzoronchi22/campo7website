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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrati</title>
  </head>
  <body>
  <?php
    if(isset($message)){
      foreach($message as $message){
          echo '
          <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
          </div>
          ';
      }
    }
  ?>
    <h3>Registrati</h3>
    <div class="container">
        <form action="" method="post">
            Username:<input type="text" name="username">
            E-mail:<input type="email" name="email">
            Password:<input type="password" name="password">
            Conferma password:<input type="password" name="cpassword">
            <input type="submit" name="registra" value="Registrati">
            <p>Hai già un account? <a href="login.php">Login</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>