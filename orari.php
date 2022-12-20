<?php
include('connection.php');
session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_name'];

if(!isset($user_id)){
  header('location:login.php');
}
$datanow = date('Y-m-d');
$dataday = date('d-m-Y', strtotime($datanow));
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
  $dataday = date('d-m-Y', strtotime($datanow));
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
    <title>Orari</title>
</head>
<body>
    <?php include 'navbar.php';
    ?>
    <div class="container" style="padding:10px;">
    <img src="img/title.png" alt="" srcset="">
      <h3 class="titlepage" style="margin:auto; padding: 5px;">Orario del giorno <?php echo $dataday ?></h3>
        <div class="container" style="width: 50%;">
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              14:00 - 15:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query14['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              15:00 - 16:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query15['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              16:00 - 17:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query16['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              17:00 - 18:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query17['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              18:00 - 19:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query18['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              19:00 - 20:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query19['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              20:00 - 21:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query20['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              21:00 - 22:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query21['username']; ?>
            </div>
          </div>
          <div class="row tablerow">
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
              22:00 - 23:00
            </div>
            <div class="col tablecol">
              <?php echo $prenot_query22['username']; ?>
            </div>
          </div>
        </div>
        <div class="container formprenota" style="padding:10px; width:50%; text-align: center;">
          <form action="" method="post">
            <div class="row tablerow">
                <div class="col" style="margin:auto;">
                  Giorno: <input type="date" name="data1" id="" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col">
                  <input type="submit" class="btn btn-secondary" name="orario" value="Cerca orario">
                </div>
            </div>
          </form>
        </div>
    </div>
    <?php include 'contatti.php';
    ?>
</body>
</html>