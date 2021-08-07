<?php

//session_start();

/*session_destroy();

  if(!empty($_SESSION['shoppingCart'])){ 

     print_r($_SESSION['shoppingCart']);
     die();

  }*/

?>

<!DOCTYPE html>
<html lang="es">

<head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width= device-width, initial-scale=1">
      <title><?php echo $data["title"]; ?></title>
      <link rel="stylesheet" href="assets/css/shopstyle.css" type="text/css">
      <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
      <link href="https://file.myfontastic.com/rDF2zywsqY9TW24h5V4rSX/icons.css" rel="stylesheet">

</head>

<body>

      <header>

            <div class="header">

                  <div class="welcome">

                        <div class="welcome-img">

                              <img class='img' src="assets/images/chess.jpeg">

                        </div>

                        <p class="p-w">
                              Welcome to Tabaco's Shop
                              <i class="icon-coffee"></i>
                              <!--icon-coffee is a class that is connected with
                         fontastic. So, while testing, if you don't see the icon, just
                         write a letter between the <i></i>, for example: <i>C</i>-->
                        </p>

                  </div>
                  <!--div welcome finishes-->

            </div>

            <!--container header-->

            <!--div info-link-user begins-->

            <div class="info-linkUsers">

                  <nav class="main-links">

                        <a href="index.php?" title="home">
                              <i class="icon-home"></i>
                              <!--icon-home is a class that is connected with
                         fontastic. So, while testing, if you don't see the icon, just
                         write a letter between the <i></i>, for example: <i>H</i>-->
                        </a>

                        <?php if (isset($_SESSION['user'])) { ?>

                              <a href="index.php?c=cart&a=inbox" title="Go to your Cart" class="a-cart">
                                    <i class="icon-shop"></i>
                                    <!--icon-shop is a class that is connected with
                         fontastic. So, while testing, if you don't see the icon, just
                         write a letter between the <i></i>, for example: <i>C</i>-->

                                    <span class="number number_cart">

                                          <?php

                                          if (!empty($_SESSION['shoppingCart'])) {

                                                echo count(($_SESSION['shoppingCart']));
                                          } else {

                                                echo 0;
                                          }

                                          ?>
                                    </span>
                              </a>

                        <?php } ?>

                        <?php

                        if (!isset($_SESSION['user'])) {

                        ?>

                              <a href="index.php?c=cart&a=login" title="Log-in">
                                    <i class="icon-sign"></i>
                                    <!--icon-sign is a class that is connected with
                         fontastic. So, while testing, if you don't see 
                         the icon, just write a letter between 
                         the <i></i>, for example: <i>R</i>-->

                              </a>

                        <?php } else { ?>

                              <a href="index.php?c=cart&a=logout" title="Log-out">
                                    <i class="icon-out"></i>
                                    <!--icon-sign is a class that is connected with
                         fontastic. So, while testing, if you don't see the 
                         icon, just write a letter between the
                          <i></i>, for example: <i>O</i>-->

                              </a>

                        <?php } ?>

                  </nav>

                  <!--nav main-links finishes-->

                  <?php if (isset($_SESSION['user'])) { ?>

                        <?php
                        //print_r($_SESSION['user']['name']);
                        //die();
                        ?>

                        <div class="user-info1">

                              <p><span>Wellcome</span>

                                    <?php echo ucwords($_SESSION['user']['name']) ?>

                              </p>

                              <p><span>Wallet's current balance:</span>

                                    <?php echo "$" . $_SESSION['user']['wallet'] ?>

                              </p>

                        </div>

                        <!--div user-info finishes-->

                  <?php } ?>

            </div>

            <!--div info-link-user finishes-->

      </header>

      <!--header finishes-->