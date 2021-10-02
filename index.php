<?php

   require_once "config/connection.php";
   require_once "model/CartModel.php";
   require_once "controller/Cart.php";
   require_once "config/library.php";
   require_once "cores/changer.php";

?>

<?php

    if(isset($_GET['c'])){

        $controller= goController($_GET['c']);

           if(isset($_GET['a'])){
               
               if(isset($_GET['id'])){
                
                createAction($controller, $_GET['a'], $_GET['id']);

               }else{

                createAction($controller, $_GET['a'], null);

               }

           }else{//if(isset($_GET['c'])) finishes...

                createAction($controller, null , null); 

           }

          //if(isset($_GET['a'])) finishes...

    }else{

      $controller= goController(MAIN_CONTROLLER);
      
      createAction($controller, null , null);

    }

?>
