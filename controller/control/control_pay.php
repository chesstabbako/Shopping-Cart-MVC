<?php

if(isset($_POST['pay'])){

  if(isset($_POST['ship'])){
   
    session_start();
    //echo $_POST['ship'];

       header('location:index.php?c=cart&a=payment&ship='.$_POST['ship']);
       
    }else{
     
      echo "You have to choose a shipping option (UPS or PickUp)!";

    }

}

?>