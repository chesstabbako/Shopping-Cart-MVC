
$(document).ready(function(){

    $("#cart-delete").hide();

    $('.delete_id').click(function(e){
        
        e.stopPropagation();
        e.preventDefault();
               
            var id= $(this).data('id');
            var button_id=$(this);
            //alert(id);
        
        $.ajax({

              method:"POST",
              url:"index.php?c=cart&a=delete",
              data:{
                
                id: id,

              }

        }).done(function(response){

            response=JSON.parse(response);
            //console.log(response.total_order);

            button_id.parent('td').parent('tr').remove();
            $(".total-price").html("$" + response.total_order);
            $(".number_cart").html(response.newCart);
            $("#cart-delete").html(response.msg).css('background-color','red').show(3000).hide(500);

            
            if(response.total_order==0 && response.newCart==0){
                
                $("#cart-success").hide();
                $("#table-info").hide();
                $("#process_buy").hide();
                $("#noItems-cart").show();
                
                //window.location.href="index.php";

            }
            
        });//ajax delete DONE finishes

    });//delete_id click finishes
     
});//ready finishes
