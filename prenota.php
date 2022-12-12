<?php
include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_name'];

if(!isset($user_id)){
  header('location:login.php');
  }

$datanow = date('Y-m-d');
$prenot_query14 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '14'") or die('query failed');
$prenot_query14 = mysqli_fetch_assoc($prenot_query14);
$prenot_query15 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '15'") or die('query failed');
$prenot_query15 = mysqli_fetch_assoc($prenot_query15);
$prenot_query16 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '16'") or die('query failed');
$prenot_query16 = mysqli_fetch_assoc($prenot_query16);
$prenot_query17 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '17'") or die('query failed');
$prenot_query17 = mysqli_fetch_assoc($prenot_query17);
$prenot_query18 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '18'") or die('query failed');
$prenot_query18 = mysqli_fetch_assoc($prenot_query18);
$prenot_query19 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '19'") or die('query failed');
$prenot_query19 = mysqli_fetch_assoc($prenot_query19);
$prenot_query20 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '20'") or die('query failed');
$prenot_query20 = mysqli_fetch_assoc($prenot_query20);
$prenot_query21 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '21'") or die('query failed');
$prenot_query21 = mysqli_fetch_assoc($prenot_query21);
$prenot_query22 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '22'") or die('query failed');
$prenot_query22 = mysqli_fetch_assoc($prenot_query22);

if(isset($_POST['orario'])){
  $datanow = mysqli_real_escape_string($conn, $_POST['data1']);
  $prenot_query14 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '14'") or die('query failed');
  $prenot_query14 = mysqli_fetch_assoc($prenot_query14);
  $prenot_query15 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '15'") or die('query failed');
  $prenot_query15 = mysqli_fetch_assoc($prenot_query15);
  $prenot_query16 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '16'") or die('query failed');
  $prenot_query16 = mysqli_fetch_assoc($prenot_query16);
  $prenot_query17 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '17'") or die('query failed');
  $prenot_query17 = mysqli_fetch_assoc($prenot_query17);
  $prenot_query18 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '18'") or die('query failed');
  $prenot_query18 = mysqli_fetch_assoc($prenot_query18);
  $prenot_query19 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '19'") or die('query failed');
  $prenot_query19 = mysqli_fetch_assoc($prenot_query19);
  $prenot_query20 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '20'") or die('query failed');
  $prenot_query20 = mysqli_fetch_assoc($prenot_query20);
  $prenot_query21 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '21'") or die('query failed');
  $prenot_query21 = mysqli_fetch_assoc($prenot_query21);
  $prenot_query22 = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$datanow' AND ora = '22'") or die('query failed');
  $prenot_query22 = mysqli_fetch_assoc($prenot_query22);
}
if(isset($_POST['prenota'])){
  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $ora = mysqli_real_escape_string($conn, $_POST['ora']);
  $durata = mysqli_real_escape_string($conn, $_POST['durata']);
    if((intval($ora) > 14) or (intval($ora) < 23)){
      if(intval($durata) == 2){
        $ora2= strval($ora + 1);
        $prenot_query = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$data' AND (ora = '$ora' OR ora = '$ora2')") or die('query failed');
        if(mysqli_num_rows($prenot_query) == 0){
          mysqli_query($conn, "INSERT INTO `prenotazioni`(username, data, ora, durata) VALUES('$username', '$data', '$ora', '$durata')") or die('query failed');
          mysqli_query($conn, "INSERT INTO `prenotazioni`(username, data, ora, durata) VALUES('$username', '$data', '$ora2', '$durata')") or die('query failed');
          $message[] = "prenotazione avvenuta con successo!";
        }else{
          $message[] = "campo già prenotato per l'ora scelta";
        }
      }else{
        $prenot_query = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$data' AND ora = '$ora'") or die('query failed');
        if(mysqli_num_rows($prenot_query) == 0){
          mysqli_query($conn, "INSERT INTO `prenotazioni`(username, data, ora, durata) VALUES('$username', '$data', '$ora', '$durata')") or die('query failed');
          $message[] = "prenotazione avvenuta con successo!";
        }else{
          $message[] = "campo già prenotato per l'ora scelta!";
        }
      }
    }else{
      $message[]="Non è consentito prenotare al di fuori dell'orario di apertura!";
    }
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
    <script src="Javascript/esec.js"></script>
    <title>Prenota</title>
    <style>
       .tablecol{
          border: 1px solid black;
          width: 100%;
        }
        .tablerow{
          padding-top: 3px;
        }
        .formprenota{
          background-color: rgb(56, 119, 227);
          margin-top: 3px;
          border-radius: 4px;
          border: 1px solid blue;
          color: whitesmoke;
        }

        .titlepage{
          text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php';
    ?>
    <div class="container" style="padding:15px;">
    <div class="container">
    <h3 class="titlepage">Prenota ora</h3>
    <?php 
    ?>
    <div class="container">
    <form action="" method="post">
      <div class="row">
          <div class="col">
            <input type="date" name="data1" id="" value="<?php echo date('Y-m-d'); ?>">
          </div>
          <div class="col">
            <input type="submit" name="orario" value="Cerca orario">
          </div>
      </div>
    </form>
      <div class="row">
        <div class="col">
          14:00 - 15:00
        </div>
        <div class="col">
          <?php echo $prenot_query14['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          15:00 - 16:00
        </div>
        <div class="col">
          <?php echo $prenot_query15['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          16:00 - 17:00
        </div>
        <div class="col">
          <?php echo $prenot_query16['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          17:00 - 18:00
        </div>
        <div class="col">
          <?php echo $prenot_query17['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          18:00 - 19:00
        </div>
        <div class="col">
          <?php echo $prenot_query18['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          19:00 - 20:00
        </div>
        <div class="col">
          <?php echo $prenot_query19['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          20:00 - 21:00
        </div>
        <div class="col">
          <?php echo $prenot_query20['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          21:00 - 22:00
        </div>
        <div class="col">
          <?php echo $prenot_query21['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          22:00 - 23:00
        </div>
        <div class="col">
          <?php echo $prenot_query22['username']; ?>
        </div>
      </div>
    </div>
    </div>
    <div class="container formprenota" style="padding:10px; width: 70%; text-align: center;">
    <form action="" method="post" onload=setData()>
      <div class="row">
        <div class="col">
        Data: <input type="date" name="data" id="date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="col">
        Ora inizio: <select name="ora" id="ora" onchange= setDurata(durata)>
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
        </div>
        <div class="col">
        Durata(ore): <input type="number" name="durata" id="durata" value=1 min=1 max=2>
        </div>
      </div>
        <div class="row">
          <div class="col">

          </div>
          <div class="col">
          <input type="submit" class="btn btn-secondary" name="prenota" value="Conferma la prenotazione">
          </form>
          </div>
          <div class="col">

          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include 'contatti.php';
    ?>
</body>
</html>