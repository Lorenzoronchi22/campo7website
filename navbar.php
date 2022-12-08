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
}?>
<nav class="navbar navbar-primary" style="background-color: rgb(56, 119, 227);">
<div class="container">
  <div class="row">
    <div class="col navbarcol">
      <a href="home.php" class="navbarlink">Home</a>
    </div>
    <div class="col navbarcol">
    <a href="orari.php" class="navbarlink">Orari</a>
    </div>
    <div class="col navbarcol">
    <a href="prenota.php" class="navbarlink">Prenota</a>
    </div>
  </div>
</div>
</nav>