
$(document).ready(function(){

    $('.addCart').click(function(e){

        e.preventDefault();

        var id= $(this).data('id');
        var name= $(this).data('name');
        var price= $(this).data('price');
        var image= $(this).data('image');
        var quantity= $(this).data('quantity');;
        
        $.ajax({
         
            method:"POST",
            url:"index.php?c=cart&a=add",
            data:{
            
                id: id,
                name:name,
                price:price,
                image: image,
                quantity: quantity,

            }
              
        }).done(function(response){
        
            $(".number_cart").html(response);
            console.log(response);
            alert('Added correctly');
                
        });//ajax addcar finishes..

    });//addcar finishes
     
});//ready finishes
