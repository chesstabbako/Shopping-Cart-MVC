
$(document).ready(function(){

    $('#pay').click(function(e){
    
        e.preventDefault();
         var ship= $(this).parent('form').find('div').find("input[type='radio']:checked").val();
        
        if(ship==0 || ship==5){
          
        window.location.href='index.php?c=cart&a=payment&ship='+ship;
        
        }else{
         
            alert('You have to choose a shipping option');
            
        }

        //alert(ship);
        
    });
 
});//ready finishes