<?php

   if(isset($_POST['id'])){

      session_start();
   
       $id= $_POST['id'];

       foreach($_SESSION['shoppingCart'] as $key=>$item){

            if($item['id']==$id){

               unset($_SESSION['shoppingCart'][$key]);

            }

       }

   }

   //print_r($_SESSION['shoppingCart']);

?>