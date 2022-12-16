<?php
    if(isset($message)){
      foreach($message as $message){
          echo '
          <div onclick=this.remove() style="background-color: whitesmoke;">
            <a href="" class="navbarlink" style="font-size: 20px; padding: 5px;"><span style="color: red;">X </span><span style="color: black;">'.$message.'</span></a>
          </div>
          ';
      }
}?>