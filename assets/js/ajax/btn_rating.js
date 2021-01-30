
$(document).ready(function(){

    $('.rate_rate').click(function(e){
    
        e.preventDefault();

         var id= $(this).data('id');
         var value= $(this).parent('form').find('div').find("input[type='radio']:checked").val();
         //rate= $(this).attr('name');
       
         if(value==1 || value==2 || value==3 || value==4 || value==5){
       
            $('.for-rate'+id).submit();

         }else{
         
            alert('You have to choose a rating option');

         }

    });
     
});//ready finishes
