
$(document).ready(function(){

    $('.number_id').change(function(e){
            
        //alert('hello');

        var id= $(this).data('id');
        var quantity= $(this).val();
            
        if(quantity<1 || quantity==""){
            
            quantity=1;

        }
        
        var total_item= $(".number"+id);
        var total_order= $(".total-price");
            
        $.ajax({

            method:"POST",
            url:"index.php?c=cart&a=btn_change",
            data:{
            
                id: id,
                quantity: quantity,

            }
              
        }).done(function(response){

            response=JSON.parse(response);
            total_item.html("$" + response.total_item.toFixed(2));
            total_order.html("$" + response.total_order.toFixed(2));
            $("number_id"+id).val(response.new_quantity);
                
        });//ajax btn_change finishes...

    });
     
});//ready finishes
