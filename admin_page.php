<?php
include('connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update'])){
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['pol_email']);
    $facebook = mysqli_real_escape_string($conn, $_POST['fblink']);
    $instagram = mysqli_real_escape_string($conn, $_POST['iglink']);
    $updatequery = mysqli_query($conn, "SELECT * FROM `contacts` WHERE contact_id = '1'") or die('query failed');
    $fetchupdate = mysqli_fetch_assoc($updatequery);
    $change = 0;
    if($phone != ''){
        if($phone != $fetchupdate['phone']){
            mysqli_query($conn, "UPDATE `contacts` SET phone = '$phone' WHERE contact_id = '1'") or die('query failed');
            $change = 1;
        }
    }
    if($email != ''){
        if($email != $fetchupdate['con_email']){
            mysqli_query($conn, "UPDATE `contacts` SET con_email = '$email' WHERE contact_id = '1'") or die('query failed');
            $change = 1;
        }
    }
    if($facebook != ''){
        if($facebook != $fetchupdate['phone']){
            mysqli_query($conn, "UPDATE `contacts` SET facebook = '$facebook' WHERE contact_id = '1'") or die('query failed');
            $change = 1;
        }
    }
    if($instagram != ''){
        if($instagram != $fetchupdate['instagram']){
            mysqli_query($conn, "UPDATE `contacts` SET instagram = '$instagram' WHERE contact_id = '1'") or die('query failed');
            $change = 1;
        }
    }

    if($change == 0){
        $message[] = "Per eseguire la modifica è necessario modificare almeno un campo!";
    }else{
        $message[] = "I contatti sono stati aggiornati!";
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
          padding: 5px;
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

        .counter{
            background-color: rgb(56, 119, 227);
            width: 50px;
            height: 50px;
            margin : auto;
            padding-top: 10px;
        }

        .countertext{
            color: white;
        }

    </style>
    <title>Admin</title>
</head>
<body>
<?php include 'admin_navbar.php'; ?>
<?php include 'message.php'; ?>
<div class="container" style="padding: 10px;">
    <img src="img/title.png" srcset="">
    <div class="container" style="width: 50%; text-align: center;">
        <div class="row tablerow">
            <div class="col tablecol">
                <?php 
                $users = mysqli_query($conn, "SELECT * FROM `users`");
                $n_users = mysqli_num_rows($users);
                ?>
                <h4>Utenti</h4>
                <div class="counter">
                    <h4 class="countertext"><?php echo $n_users ?></h4>
                </div>
            </div>
            <div class="col tablecol">
            <?php 
                $prenotazioni = mysqli_query($conn, "SELECT * FROM `prenotazioni`");
                $n_prenotazioni = mysqli_num_rows($prenotazioni);
                ?>
                <h4>Prenotazioni</h4>
                <div class="counter">
                    <h4 class="countertext"><?php echo $n_prenotazioni ?></h4>
                </div>
            </div>
        </div>
        <div class="row tablerow">
            <div class="col tablecol">
                <h4>Tariffa</h4>
            </div>
            <div class="col tablecol">
                <h4>Totale Incassi (Mensili)</h4>
            </div>
        </div>
    </div>
    <div class="container formprenota" style="padding:10px; width: 50%; text-align: center;">
        <form action="" method="post">
            <h3>Modifica Contatti</h3>
            <div class="row tablerow">
                <div class="col">
                    Numero telefono:
                </div>
                <div class="col">
                    <input type="tel" name="phone" id="phone">
                </div>
            </div>
            <div class="row tablerow">
                <div class="col">
                    Email: 
                </div>
                <div class="col">
                    <input type="email" name="pol_email" id="pol_email">
                </div>
            </div>
            <div class="row tablerow">
                <div class="col">
                    Facebook: 
                </div>
                <div class="col">
                    <input type="text" name="fblink" id="fblink">
                </div>
            </div>
            <div class="row tablerow">
                <div class="col">
                    Instagram: 
                </div>
                <div class="col">
                    <input type="text" name="iglink" id="iglink">
                </div>
            </div>
                <input type="submit" name="update" id="update" class="btn btn-warning" value="Modifica" style="width: 200px; margin-top: 5px;">
            </div>
        </form>
    </div>
</div>
    
</body>
</html>