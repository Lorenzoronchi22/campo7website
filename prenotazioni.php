<?php
include('connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['elimina'])){
    $id = mysqli_real_escape_string($conn, $_POST['prenotazioneid']);
    $control_id = mysqli_query($conn, "SELECT * FROM `prenotazioni` WHERE prenotazione_id = '$id'") or die('query failed');
    $fetch_prenotazione = mysqli_fetch_assoc($control_id);
    $data = $fetch_prenotazione['data'];
    if (mysqli_num_rows($control_id) > 0){
        if(intval($id) >= 0){
            mysqli_query($conn, "DELETE FROM `prenotazioni` WHERE prenotazione_id = '$id' OR data = '$data'") or die('query failed');
            $message[] = "Prenotazione eliminato!";
        }else{
            $message[] = "Attenzione! L'id non può essere minore di zero!";
        }
    }else{
        $message[] = "Attenzione! La prenotazione che si vuole eliminare cercato è inesistente!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/camposportivo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="Javascript/esec.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Prenotazioni</title>
</head>
<body>
<?php include 'admin_navbar.php'; ?>
<?php include 'message.php'; ?>
<div class="container" style="padding: 10px;">
    <img src="img/title.png" srcset="">
    <div class="container formprenota" style="padding:10px; width: 70%; text-align: center;">
        <form action="" method="post">
            <h3>Prenotazioni</h3>
            <div class="row tablerow">
                <div class="col">
                    Id: <input type="number" name="prenotazioneid" id="prenotazioneid" value=1 min=0>
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-danger" name="elimina" value="Elimina prenotazione">
                </div>
            </div>
        </form>
    </div>
    <?php
    $user = mysqli_query($conn, "SELECT * FROM `prenotazioni`") or die('query failed');
    if(mysqli_num_rows($user) > 0){
    echo'<div class="container" style="width: 70%;">
    <div class="row tablerow">
          <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
            <p>Id:</p>
          </div>
          <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
            <p>username:</p>
          </div>
          <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
            <p>data:</p>
            </div>
          <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
            <p>ora:</p>
          </div>
          <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
          <p>durata:</p>
        </div>
        <div class="col tablecol" style="background-color: rgb(138, 179, 248)">
        <p>tariffa:</p>
      </div>
        </div>
    </div>';
    while($fetch_user = mysqli_fetch_assoc($user)){    
    ?>
    <div class="container" style="width: 70%;">
      <div class="row tablerow">
            <div class="col tablecol">
              <p><?php echo $fetch_user['prenotazione_id']; ?></p>
            </div>
            <div class="col tablecol">
              <p><?php echo $fetch_user['username']; ?></p>
            </div>
            <div class="col tablecol">
              <p><?php echo date('d-m-Y',strtotime($fetch_user['data'])); ?></p>
            </div>
            <div class="col tablecol">
              <p><?php echo $fetch_user['ora']; ?></p>
            </div>
            <div class="col tablecol">
              <p><?php echo $fetch_user['durata']; ?></p>
            </div>
            <div class="col tablecol">
              <p><?php echo $fetch_user['tariffa_prenotazione']; ?>€</p>
            </div>
          </div>
      </div>
    <?php
    }
    }else{
        echo '<div class="container" style="width:70%; margin-top: 5px; background-color: whitesmoke;">
        <p style="margin: auto; text-align: center;">Nessuna prenotazione effettuata!</p>
        </div>';
    };
    ?>

</div>
    
</body>
</html>