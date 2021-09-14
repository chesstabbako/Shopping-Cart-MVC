$(document).ready(function () {
  //$("#msg-success").hide();
  $(".addCart").click(function (e) {
    e.stopPropagation();
    e.preventDefault();

    var id = $(this).data("id");
    var name = $(this).data("name");
    var price = $(this).data("price");
    var image = $(this).data("image");
    var quantity = $(this).data("quantity");

    $.ajax({
      method: "POST",
      url: "index.php?c=cart&a=add",
      data: {
        id: id,
        name: name,
        price: price,
        image: image,
        quantity: quantity,
      },
    }).done(function (response) {
      response = JSON.parse(response);

      $(".number_cart").html(response.shoppingCart);
      $("#msg-success").html(response.msg).show(3000).hide(1500);

      console.log(response);
    }); //ajax addCar finishes..
  }); //addCar finishes
}); //ready finishes
