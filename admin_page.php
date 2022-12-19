<?php
include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];
$username = $_SESSION['user_name'];
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
    
    <title>Admin</title>
</head>
<body>
<?php include 'admin_navbar.php'; ?>
<?php include 'message.php'; ?>
<div class="container" style="padding: 10px;">
    <img src="img/title.png" srcset="">
    <p>num utenti</p>
    <p>num prenotazioni</p>
    <p>tariffa</p>
    <p>totale €</p>
    <p>contatti</p>
</div>
    
</body>
</html>