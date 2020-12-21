   
<main>
            
<!--section begins-->
            
      <section class="container-cart">

            <?php if(empty($_SESSION['shoppingCart'])){ ?>

                  <div class="message cart-danger">
                        <p>
                              
                             <span class="icon-danger"></span> Your order is empty: 
                             go to home and and beging adding to the cart.
                             <!--icon-danger is a class that is connected width
                             fontastic. So, while testing, if you dont see the icon, just
                             write a letter between the <span></span>, for example: <span>x</span>-->
                              
                        </p>
                  </div>

            <?php } ?>

            <?php if(!empty($_SESSION['shoppingCart'])){ ?>
                  
                  <div class="message cart-success">

                        <p>
                              
                             <span class="icon-success"></span> Please verify: you can edit
                              the quantity of the items or delete them  if this order doesn't
                               matches the one you have chosen.
                               <!--icon-success is a class that is connected 
                               widthfontastic. So, while testing, if you dont
                              see the icon, justwrite a letter between the
                               <span></span>, for example: <span>ok</span>-->
                              
                        </p>

                  </div>
                  
                  <!--div items-added begins-->
                  
                  <div class="items-added">
                        
                          <!--div table begins-->
                        
                        <table class="table">
                            
                             <!--div thead begins-->  
                             
                              <thead>
                                    
                                    <tr>
                                          
                                          <th>Name</th>
                                          <th>Price</th>
                                          <th>Quantity</th>
                                          <th>Total item</th>
                                          <th>Delete item</th>
                                          
                                    </tr>
                                    
                              </thead>
                              
                               <!--thead finishes-->
                               
                               <!-- tbody begins-->
                              
                              <tbody>
                                     
                              <?php $total_item=0; ?>
                              <?php $total_order=0; ?>

                              <?php foreach($_SESSION['shoppingCart'] as $key=>$item){ ?>

                                    <!-- tbody tr begins-->
                                    
                                    <tr>
                                          
                                          <td><?php echo $item['name'];?></td>
                                          
                                          <td><?php echo "$ ". $item['price'];?></td>
                                          
                                          <td class="table-buttons">
            
                                                <div class="form-buttons">
                                                      
                                                      <input type="number"
                                                      data-id="<?php echo $item['id'];?>"
                                                      name="number" id="number_id" class="number_id number_id<?php echo $item['id'];?>" min="1"
                                                      value="<?php echo $item['quantity'];?>">
                                                      
                                                 </div>
                  
                                          </td>
                                          
                                           <td class="number<?php echo $item['id'];?>">

                                                <?php
                                          
                                                  $total_item= $item['price']*$item['quantity'];
                                                  echo "$" . $total_item;
                   
                                                ?>
                                          </td>
                                           
                                          <td >
                                                <a href="#"
                                                    title="Delete item" 
                                                    data-id="<?php echo $item['id'];?>"
                                                    class="delete delete_id">X
                                                </a>
                                          </td>
               
                                    </tr>
                                    
                                     <!-- tbody tr finishes-->

                                    <?php } ?>
                                    
                                     <!-- tbody tr finishes-->
                                     
                                     <tr class="total total_total">
                                          
                                          <td colspan="3" class="ms-price">Total to pay:</td>
                                           
                                          <td class="total-price">

                                                <?php 
                                                
                                                foreach($_SESSION['shoppingCart'] as $key=>$item){

                                                    $total_order+= $item['price']*$item['quantity'];

                                                } 

                                                echo "$" . $total_order;
                                                
                                                ?> 

                                          </td>
               
                                    </tr>

                              </tbody>

                              <!--tbody finishes-->
                              
                        </table>
                        
                        <!--table items finishes-->
                        
                  </div>
                  
                  <!--div items-added finishes-->
                    
            <?php } ?>
                  
                   <!--div complete-process begin-->
                  
                  <?php if(!empty($_SESSION['shoppingCart'])){ ?>

                  <div class="complete-process process_buy">
                        
                        <div class="buy">
                              
                              <form action="" 
                              method="POST" id="payform">
                                     
                                    <div class="form-group">

                                       <label for="pickUp">Pick Up</label>
                                       <input type="radio" name="ship"
                                        id="pickUp" value="0" >

                                    </div>
                              
                                    <div class="form-group">

                                       <label for="ups">UPS</label>
                                       <input type="radio" name="ship"
                                       id="ups" value="5">
                                
                                    </div>

                                   <input type="submit"
                                    name="pay" 
                                    value="Complete"
                                    id="pay" 
                                    >
                                    
                              </form>
                              
                        </div>
                        
                        <!--div buy finishes-->
                        
                  </div>
                  
                  <!--div complete-process finishes-->

                  <?php } ?>
                  
      </section>
            
            <!--section  container-cart finishes-->
            
      </main>
      
      <!--main finishes-->
      