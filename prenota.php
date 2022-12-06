<?php
include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
}

if(isset($_POST['prenota'])){
  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $ora = mysqli_real_escape_string($conn, $_POST['ora']);
  $durata = mysqli_real_escape_string($conn, $_POST['durata']);
  mysqli_query($conn, "INSERT INTO `prenotazioni`(userid, data, ora, durata) VALUES('$user_id', '$data', '$ora', '$durata')") or die('query failed');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/camposportivo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>La Delizia Arena</title>
</head>
<body>
    <?php include 'navbar.php';
    ?>
    <div class="container">

      <h3>Prenota ora</h3>
      <form action="" method="post">
        Data: <input type="date" name="data" id="">
        Ora inizio: <select name="ora" id="">
        <option value="14">14:00</option>
        <option value="15">15:00</option>
        <option value="16">16:00</option>
        <option value="17">17:00</option>
        <option value="18">18:00</option>
        <option value="19">19:00</option>
        <option value="20">20:00</option>
        <option value="21">21:00</option>
        <option value="22">22:00</option>
        </select>
        Durata(ore): <input type="number" name="durata" id="" value=1 min=1 max=2>
        <input type="submit" name="prenota" value="Conferma la prenotazione">
      </form>
    </div>
    <?php include 'contatti.php';
    ?>
</body>
</html>