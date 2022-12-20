<?php
include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_name'];

if(!isset($user_id)){
  header('location:login.php');
  }

$today = date('Y-m-d');
if(isset($_POST['elimina'])){
    $code_prenot = mysqli_real_escape_string($conn, $_POST['code_prenot']);
    $control_query = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE codice_prenotazione = '$code_prenot'") or die('query failed');
    if(mysqli_num_rows($control_query) > 0){
        $fetch_control_query = mysqli_fetch_assoc($control_query);
        if($fetch_control_query['data'] > $today){
            mysqli_query($conn, "DELETE FROM `prenotazioni` WHERE codice_prenotazione = '$code_prenot'") or die('query failed');
            $message[] = "La prenotazione è stata eliminata con successo!";
        }
        elseif($fetch_control_query['data'] == $today){
            $message[] = "Non è possibile eliminare la prenotazione! La prenotazione dev'essere disdetta con almeno un giorno di anticipo!";
        }else{
            $message[] = "Non è possibile eliminare la prenotazione! Non è possibile disdire una prenotazione con data precedente a quella di oggi!";
        }
    }else{
        $message[] = "La prenotazione che si vuole eliminare è inesistente!";
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
    <link rel="stylesheet" href="CSS/camposportivo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="Javascript/esec.js"></script>
    <title>Elimina prenotazione</title>
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
  <?php include 'message.php';
  ?>
  <div class="container" style="padding:10px;">
    <div class="container">
    <img src="img/title.png" alt="" srcset="">
      <h1 style = "text-align: center;">Le tue prenotazioni</h1>
      <div class="container" style="width: 70%; text-align: center;">
      <div class="btn-group">
        <a href="prenota.php" class="btn btn-secondary">Prenota</a>
        <a href="" class="btn btn-danger">Elimina</a>
      </div>
      </div>
      <div class="container formprenota" id="form_prenota" style="padding:10px; width: 70%; text-align: center;">
        <h3>Elimina prenotazione</h3>
        <form action="" method="post">
          <div class="row tablerow">
          </div>
          <div class="row tablerow">
            <div class="col">
                <input type="text" name="code_prenot" id="code_prenot" placeholder="codice prenotazione">
            </div>
          </div>
          <div class="row tablerow">
            <div class="col">
              <input type="submit" class="btn btn-danger" name="elimina" value="Elimina">
            </div>
          </div>
        </form>
      </div>
      <?php
      $prenotazioni = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE username ='$username' ORDER BY data") or die('query failed');
      if(mysqli_num_rows($prenotazioni) > 0){
        echo '<div class="container" style="width: 70%;">
        <div class="row tablerow">
              <div class="col tablecol" style="background-color: rgb(138, 179, 248); margin-right: 3px;">
                <p>Data:</p>
              </div>
              <div class="col tablecol" style="background-color: rgb(138, 179, 248); margin-right: 3px;">
                <p>Ora:</p>
              </div>
              <div class="col tablecol" style="background-color: rgb(138, 179, 248); margin-right: 3px;">
                <p>Durata(ore):</p>
              </div>
              <div class="col tablecol" style="background-color: rgb(138, 179, 248); margin-right: 3px;">
              <p>Tariffa (oraria):</p>
            </div>
            <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
            <p>Codice:</p>
          </div>
            </div>
        </div>';
        while($fetch_prenotazioni = mysqli_fetch_assoc($prenotazioni)){
      ?>
      <div class="container" style="width: 70%;">
      <div class="row tablerow">
            <div class="col tablecol" style="margin-right: 3px;">
              <p><?php echo date('d-m-Y',strtotime($fetch_prenotazioni['data'])); ?></p>
            </div>
            <div class="col tablecol" style="margin-right: 3px;">
              <p><?php echo $fetch_prenotazioni['ora']; ?>:00</p>
            </div>
            <div class="col tablecol" style="margin-right: 3px;">
              <p><?php echo $fetch_prenotazioni['durata']; ?></p>
            </div>
            <div class="col tablecol" style="margin-right: 3px;">
              <p><?php echo $fetch_prenotazioni['tariffa_prenotazione']; ?>€</p>
            </div>
            <div class="col tablecol">
              <p><?php echo $fetch_prenotazioni['codice_prenotazione']; ?></p>
            </div>
          </div>
      </div>
      <?php
          }
      }else{
        echo '<div class="container" style="width:70%; margin-top: 5px; background-color: whitesmoke;">
        <p style="margin: auto; text-align: center;">Nessuna prenotazione effettuata!</p>
        </div>';
      }
      ?>
    </div>
  </div>
  <?php include 'contatti.php';
    ?>
</body>
</html>