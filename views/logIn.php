<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>

<main> 
<section>
    
    <form action="index.php?c=cart&a=test_session" method="POST" id="form">
        
        </div>
            
            <?php 
            
            if(isset($_GET['s'])){ 
                
                if($_GET['s']==1){
                
            ?>

                <div class="error">
                
                   <p>You were sucessfully registered</p>
                
                </div>

            <?php }} ?>
        
        <div class="form">
            
            <div class="group">
                
                <input type="email" name="mail" id="mail" required autocomplete="off">
                <span class="line"></span>
                <label for="mail">e-mail</label>
                
            </div>
            
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
            
            <button type="submit" name="login" id="login">Log in</button>
            
            <div class="register">
                
                <a href="index.php?" 
                   title="Back">
                   Back
                </a>
            
                <a href="index.php?c=cart&a=register" 
                   title="Register">
                   Not registered?
                </a>

            </div>
   
        </div>
        
    </form>

</section>
</main> 

</body>
</html>
