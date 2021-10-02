<?php

function goController($controller){

     $newController= ucwords($controller)."Controller";
     $fileController= "controller/".ucwords($controller).".php";

      if(is_file($fileController)){
      
        $fileController="controller/".MAIN_CONTROLLER.".php";
      
      }//if(is_file($fileController)) finishes...

    require_once $fileController;

    $control= new $newController;

    return $control;

}//function goController($controller) finishes...

function createAction($controller, $action, $id=null){

    if(isset($action) && method_exists($controller, $action)){

          if($id==null){
            
            $controller->$action();

          }else{

            $controller->$action($id);

          }

    }else{

       $mainAction= MAIN_ACTION;

       $controller->$mainAction();

    }

}
