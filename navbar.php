<nav class="navbar navbar-primary" style="background-color: rgb(56, 119, 227);">
<div class="container">
  <div class="row">
    <div class="col navbarcol">
      <a href="home.php" class="navbarlink">Home</a>
    </div>
    <div class="col navbarcol">
    <a href="prenota.php" class="navbarlink">Prenota</a>
    </div>
    <div class="col navbarcol">
    <a href="prenotazioni.php" class="navbarlink">Orari</a>
    </div>
    <div class="col navbarcol">
    <a href="logout.php" class="navbarlink" name="logout" id="logout">Logout</a>
    </div>
  </div>
</div>
</nav>
<?php if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="container" style="width:100%; background-color: whitesmoke;" onclick=this.remove()>
         <a href="" class="navbarlink" style="padding: 5px; color: black; font-size: 20px;"><span style="color:red;">X  </span><span style="padding: 5px; color: black; font-size: 20px;">'.$message.'</span>
      </div>
      ';
   }
} ?>
