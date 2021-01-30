<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="assets/css/form.css" rel="stylesheet" type="text/css">
</head>
<body>

<main> 
<section> 
      
    <form action="index.php?c=cart&a=test" method="POST" id="form">
        
        <div class="form">
         
            <div class="group">
                
                <input type="text" name="name" id="name" 
                required autocomplete="off">
                <span class="line"></span>
                <label for="name">Name</label>
                
            </div>
            
            <div class="group">
                
                <input type="email" name="mail" id="mail"
                 required autocomplete="off">
                <span class="line"></span>
                <label for="mail">e-mail</label>
                
            </div>

            <!--
            <div class="group">
                
                <input type="email" name="mail_r" id="mail_r" 
                required autocomplete="off">
                <span class="line"></span>
                <label for="mail_r">Repeat email</label>
                
            </div>
            -->
            
            <div class="group">
                
                <input type="password" name="pass" id="pass"
                 required autocomplete="off">
                <span class="line"></span>
                <label for="pass">Password</label>
                
            </div>
            
            <?php 
            
            if(isset($_GET['e'])){ 
                
                if($_GET['e']==1){
                
            ?>

                <div class="error">
                
                   <p><span>X</span>Usuario no registrado</p>
                
                </div>

            <?php }} ?>
            
            <button type="submit" name="register" id="register">
              Register
            </button>
            
            <div class="register">
                
                <a href="index.php?c=cart&a=login" 
                   title="Back">
                   Back
                </a>

            </div>
   
        </div>
        
    </form>

</section> 
</main> 

</body>
</html>