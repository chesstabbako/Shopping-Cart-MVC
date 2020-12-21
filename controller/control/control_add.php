<?php

if(isset($_POST['id'])){

  //session_start();

      if(is_numeric($_POST['id'])){
        
        $id= $_POST['id'];

      }

      if(is_string($_POST['name'])){

        $name= $_POST['name'];

      }

      if(is_string($_POST['image'])){

        $image= $_POST['image'];

      }

      if(is_numeric($_POST['price'])){
        
        $price= $_POST['price'];

      }

      if(is_numeric($_POST['quantity'])){
        
        $quantity= $_POST['quantity'];

      }

      if(!isset($_SESSION['shoppingCart'])){

              $items= array(

                'id'=>$id,
                'name'=>$name,
                'image'=>$image,
                'price'=>$price,
                'quantity'=>$quantity

              );

              $_SESSION['shoppingCart'][0]= $items;

              $message= "<i class= 'icon-check'></i>Item added correctly";
            
      }else{

            $columns= array_column($_SESSION['shoppingCart'], 'id');

              if(in_array($id, $columns)){

                foreach($_SESSION['shoppingCart'] as $key=>$item){

                 //print_r($items);

                    if($item['id']==$id){

                       $_SESSION['shoppingCart'][$key]['quantity']=$_SESSION['shoppingCart'][$key]['quantity'] + 1;
                       
                    }

                }

            }else{
                 
              $counter= count($_SESSION['shoppingCart']);
             
              $items= array(

                'id'=>$id,
                'name'=>$name,
                'image'=>$image,
                'price'=>$price,
                'quantity'=>$quantity

              );

              $_SESSION['shoppingCart'][$counter]= $items;

            }

     //echo count($_SESSION['shoppingCart']);

  }

  echo count($_SESSION['shoppingCart']);

}else{

echo "Error";

}
  
?>

