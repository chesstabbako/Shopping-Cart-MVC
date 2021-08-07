   <main>

         <?php if (!isset($_SESSION['user'])) { ?>

               <div class="message cart-success">

                     <p>

                           "Hello, wellcome! If you want to buy products... just
                           log-in and begin taking the best..."

                     </p>

               </div>

         <?php } else { ?>

               <div class="message cart-success" id="msg-success">

                     <p>

                           "Add products by clicking to add to cart"

                     </p>

               </div>

         <?php } ?>

         <section class="container-items">

               <!--empieza item-->

               <?php

                  /*
              print_r($data["items"]);
                
              die(); 

              */

                  ?>

               <?php for ($i = 0; $i < count($data["items"][0]); $i++) { ?>

                     <div class="item">

                           <div class="item-img">

                                 <img src="assets/images/<?php echo $data["items"][0][$i]['image']; ?>">

                           </div>

                           <!--item-img finishes-->

                           <div class="item-descripcion">

                                 <?php if (isset($_SESSION['user'])) { ?>

                                       <p class="rate1">

                                       <form action="index.php?c=cart&a=rate_item" method="post" class="for-rate for-rate<?php echo $data["items"][0][$i]['id']; ?>" id="for-rate">

                                             <div>

                                                   <input type="hidden" name="id_item" value="<?php echo $data["items"][0][$i]['id']; ?>">
                                                   <input type="hidden" name="name_item" value="<?php echo $data["items"][0][$i]['name']; ?>">
                                                   <input type="radio" name="value" id="ra_item" value="1">
                                                   <input type="radio" name="value" id="ra_item" value="2">
                                                   <input type="radio" name="value" id="ra_item" value="3">
                                                   <input type="radio" name="value" id="ra_item" value="4">
                                                   <input type="radio" name="value" id="ra_item" value="5">

                                             </div>

                                             <input type="submit" data-id="<?php echo $data["items"][0][$i]['id']; ?>" name="rate" id="rate_rate" class="rate3 rate_rate" value="Rate">

                                       </form>

                                       </p>

                                 <?php } ?>

                                 <p class="item-name">
                                       <?php echo $data["items"][0][$i]['name']; ?>
                                 </p>

                                 <p class="item-price">
                                       <span class="dolar">$</span>
                                       <?php echo $data["items"][0][$i]['price']; ?>
                                 </p>

                                 <p class="item-rate">
                                       users' rating average:
                                       <span class="span-rate">
                                             <?php echo $data["items"][0][$i]['rating']; ?>
                                       </span>
                                 </p>

                           </div>

                           <!--item-descripcion finishes-->
                           <?php if (isset($_SESSION['user'])) { ?>

                                 <div class="div-form">

                                       <!--form begins-->

                                       <form action="#" method="post">

                                             <input type="submit" name="addCart" id="addCart" class="addCart" data-id="<?php echo $data["items"][0][$i]['id']; ?>" data-image="<?php echo $data["items"][0][$i]['image']; ?>" data-name="<?php echo $data["items"][0][$i]['name']; ?>" data-price="<?php echo $data["items"][0][$i]['price']; ?>" data-quantity="1" value="Add to cart">

                                       </form>

                                       <!--form finishes-->

                                 </div>
                                 <!--div-form finishes-->

                           <?php } ?>

                     </div>

                     <!--div item finishes-->

               <?php } ?>

         </section>

         <!--section 'countainer 'items' finishes-->

   </main>

   <!--main finishes-->