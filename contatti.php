<?php 
$contact_query = mysqli_query($conn, "SELECT * FROM `contacts`") or die('query failed');
$fetch_contact = mysqli_fetch_assoc($contact_query);
?>
<section class="footer">
   <div class="container">
      <div class="row">
         <div class="col">
            <h3>Per informazioni:</h3>
            <p> <?php echo $fetch_contact['phone']; ?> </p>
            <p> <?php echo $fetch_contact['con_email']; ?> </p>
            <p> Caino, Italia - 25070 </p>
         </div>
         <div class="col">
         <h3>Seguici su:</h3>
         <p><img src="img/fb.png" width="30" height="30" style="padding: 3px;"><a href="<?php echo $fetch_contact['facebook']; ?>" class="contactlink">polisportivacaino</a></p>
         <p><img src="img/ig.png" width="30" height="30" style="padding: 3px;"><a href="<?php echo $fetch_contact['instagram']; ?>" class="contactlink">polisportivacaino</a></p>
         </div>
      </div>
</section>