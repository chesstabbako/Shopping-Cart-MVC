<?php

if(isset($_POST['id']) && isset($_POST['quantity'])){

//session_start();

$id= $_POST['id'];
$quantity= $_POST['quantity'];

}

$total_order=0;
$total_item=0;
$new_quantity=0;

$columns= array_column($_SESSION['shoppingCart'], 'id');

if(in_array($id, $columns)){

  foreach($_SESSION['shoppingCart'] as $key=>$item){

   //print_r($items);

      if($item['id']==$id){

         $_SESSION['shoppingCart'][$key]['quantity']=$quantity;
         $total_item= $_SESSION['shoppingCart'][$key]['quantity']*$_SESSION['shoppingCart'][$key]['price'];
         $new_quantity= $_SESSION['shoppingCart'][$key]['quantity'];

      }

  }

foreach($_SESSION['shoppingCart'] as $key=>$item){

    $total_order+= $item['price']*$item['quantity'];

} 

$response= new stdClass();
                 
    $response->total_order=$total_order;
    $response->total_item=$total_item;
    $response->new_quantity=$new_quantity;
            
    $json= json_encode($response); 

    echo $json;

}

 
?>