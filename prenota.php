<?php
include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_name'];

if(!isset($user_id)){
  header('location:login.php');
  }

$today = date('Y-m-d');
if(isset($_POST['prenota'])){
  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $ora = mysqli_real_escape_string($conn, $_POST['ora']);
  $durata = mysqli_real_escape_string($conn, $_POST['durata']);
  $control_query = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$data' AND username ='$username'") or die('query failed');
    if($data > $today){
      if((intval($ora) > 14) or (intval($ora) < 23)){
        if(intval($durata) <= 2){
          if(intval($durata) == 2){
            if(mysqli_num_rows($control_query) == 0){
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
              $message[] = "Non è consentito prenotare il campo per più di due ore nello stesso giorno!";
            }
          }else{
            if(mysqli_num_rows($control_query) < 2){
              $prenot_query = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE data = '$data' AND ora = '$ora'") or die('query failed');
              if(mysqli_num_rows($prenot_query) == 0){
                mysqli_query($conn, "INSERT INTO `prenotazioni`(username, data, ora, durata) VALUES('$username', '$data', '$ora', '$durata')") or die('query failed');
                $message[] = "prenotazione avvenuta con successo!";
              }else{
                $message[] = "campo già prenotato per l'ora scelta!";
              }
            }else{
              $message[] = "Non è consentito prenotare il campo per più di due ore nello stesso giorno!";
            }
          }
        }else{
          $message[] = "Non è consentito prenotare per più di due ore consecutive!";
        }
      }else{
        $message[] = "Non è consentito prenotare al di fuori dell'orario di apertura!";
      }
    }else{
      if(intval($data) - intval($today) <= 1){
        $message[] = "Attenzione! Il campo dev'essere prenotato almeno un giorno prima per consentire allo staff di predisporre le atrezzature!";
      }else{
        $message[] = "Attenzione! Non è consentito prenotare in una data già trascorsa!";
      }
    }
  }

  if(isset($_POST['elimina'])){
    $data = mysqli_real_escape_string($conn, $_POST['data']);
    $ora1 = mysqli_real_escape_string($conn, $_POST['ora']);
    $durata = mysqli_real_escape_string($conn, $_POST['durata']);
    $delete_query = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE username ='$username' AND data = '$data' AND ora = '$ora1' AND durata = '$durata'") or die('query failed');
    if(mysqli_num_rows($delete_query) > 0){
        if($data > $today){
          if(intval($durata) == 2){
            mysqli_query($conn, "DELETE FROM `prenotazioni` WHERE username ='$username' AND data = '$data' AND durata = '$durata'") or die('query failed');
            $message[] = "La prenotazione è stata eliminata con successo!";
          }else{
            mysqli_query($conn, "DELETE FROM `prenotazioni` WHERE username ='$username' AND data = '$data' AND ora = '$ora' AND durata = '$durata'") or die('query failed');
            $message[] = "La prenotazione è stata eliminata con successo!";
          }
        }else{
          $message[] = "Non è più possibile cancellare la prenotazione!";
        }
    }else{
      $message[] = "La prenotazione che si vuole eliminare è inesistente! Controllare l'orario!";
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
  <?php include 'message.php';
  ?>
  <div class="container" style="padding:10px;">
    <div class="container">
    <img src="img/title.png" alt="" srcset="">
      <h1 style = "text-align: center;">Le tue prenotazioni</h1>
      <div class="container formprenota" style="padding:10px; width: 70%; text-align: center;">
        <h3>Prenota ora</h3>
        <form action="" method="post" onload=setData()>
          <div class="row tablerow">
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
          <div class="row tablerow">
            <div class="col">
            </div>
            <div class="col">
              <input type="submit" class="btn btn-secondary" name="prenota" value="Conferma la prenotazione">
            </div>
            <div class="col">
              <input type="submit" class="btn btn-danger" name="elimina" value="Elimina la prenotazione">
            </div>
          </div>
        </form>
      </div>
      <?php
      $prenotazioni = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE username ='$username' ORDER BY data") or die('query failed');
      if(mysqli_num_rows($prenotazioni) > 0){
          while($fetch_prenotazioni = mysqli_fetch_assoc($prenotazioni)){
      ?>
      <div class="container" style="width: 70%;">
      <div class="row tablerow">
            <div class="col tablecol">
              <p class="p_prenota">Data: <span><?php echo date('d-m-Y',strtotime($fetch_prenotazioni['data'])); ?></span></p>
            </div>
            <div class="col tablecol">
              <p class="p_prenota">Ora: <span><?php echo $fetch_prenotazioni['ora']; ?>:00</span></p>
            </div>
            <div class="col tablecol">
              <p class="p_prenota">Durata(ore): <span><?php echo $fetch_prenotazioni['durata']; ?></span></p>
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