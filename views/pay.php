<?php

//session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Process</title>
    <link rel="stylesheet" href="assets/css/pay.css" type="text/css">
</head>
<body>

<main>

   <section>

<?php

       $total_order= 0;
                                                
       foreach($_SESSION['shoppingCart'] as $key=>$item){
      
        $total_order+= $item['price']*$item['quantity'];

       }

       //echo $total_order ."<br>";
       //echo $_SESSION['user']['name'] ."<br>";
       //echo $_GET['ship']."<br>";

       $ship_option="";

       if($_GET['ship']==0){

        $ship_option= "PickUp";

       }else if($_GET['ship']==5){

        $ship_option= "UPS";

       }

       //echo $ship_option."<br>";

       $total_purchase= $total_order+$_GET['ship'];

       //echo $total_purchase."<br>";

       //echo $_SESSION['user']['wallet'];

       //die();

?>

        <?php if($_SESSION['user']['wallet']>=$total_purchase){?>   

        <div class="div verify">

            <p>
              Please, verify your purchase before making the payment
            </p>
 
        </div> 

        <div class="div purchase">

            <p>
              <span>Available current balance:</span>
              <?php echo "$". $_SESSION['user']['wallet'];?>
            </p>

            <p>
              <span>Name:</span>
              <?php echo ucwords($_SESSION['user']['name']);?>
            </p>

            <p>
              <span>total order:</span>
              <?php echo "$". $total_order;?>
            </p>

            <p>
              <span>Shipping option:</span>
              <?php 
              echo $ship_option. " ";?>cost:<?php echo " $" . $_GET['ship'];
              ?>
            </p>

            <p>
              <span>Total purchase cost:</span>
              <?php echo "$" . $total_purchase;?>  
            </p>

            <p>
                <span>Available balance after the purchase:</span>
                <?php echo "$" . ($_SESSION['user']['wallet']-$total_purchase);?> 
            </p>

          <div class="a_purchase">
                
            <a href="index.php?c=cart&a=inbox" 
              title="Come Back" 
              class="come">
              Come Back
            </a>

          <div class="button-form">

          <form action="index.php?c=cart&a=process" method="post">
                              
            <input type="hidden" 
            name="id_user" 
            value="<?php echo $_SESSION['user']['id'];?>"
            >
            <input type="hidden"
             name="name_user" 
             value="<?php echo $_SESSION['user']['name'];?>"
             >
            <input type="hidden" 
            name="email_user" 
            value="<?php echo $_SESSION['user']['email'];?>"
            >
            <input type="hidden" 
            name="order_total" 
            value="<?php echo $total_purchase;?>"
            >
            <input type="hidden" 
            name="remain" 
            value="<?php echo $_SESSION['user']['wallet']-$total_purchase;?>"
            >

            <input type="submit"
             name="pay" class="pay"
             title="Pay"
             id="pay" value="Pay"
             >
                            
          </form>

          </div><!-- div button-form finishes-->
            
          </div><!--a_purchase finishes-->
          
       </div><!--div purchase finishes-->

       <?php }else{ ?>

        <div class="no-enought">

           <p>
            Sorry, the money in your wallet is not enought->
           </p>
           <a href="index.php?c=cart&a=inbox"
            title="Come Back">
            Back
           </a>

        </div> 

       <?php }  ?>  

   </section>

</main>

</body>
</html>