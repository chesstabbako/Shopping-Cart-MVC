<?php 

class CartController{

    public function index(){

    session_start();
          
          $data["title"]= "Shopping Cart";
          $items= new CartModel();
          $data["items"]= $items->get_items();
          require_once "views/layouts/header.php";
          require_once "views/shop.php";
          require_once "views/layouts/footer.php";
          
    }//function index

    public function inbox(){

        session_start();

        if(!isset($_SESSION['user'])){

          header('location:index.php');

        }else{

        $data["title"]= "My order";
        $items= new CartModel();
        require_once "views/layouts/header.php";
        require_once "views/cart.php";
        require_once "views/layouts/footer.php"; 

        }
        
    }//function inbox()
    
    /*public function add($id){
        
        //mistake: the db is not necessary
        $data["title"]= "My order";
        $items= new CartModel();
        $data["items"]= $items->takeId($id);
        require_once "controller/control/control_add.php";
        header('location: index.php');
        //$this->index();
           
    }//function add*/

    public function add(){

        session_start();

        if(!isset($_SESSION['user'])){

          header('location:index.php');

        }else{

        require_once "controller/control/control_add.php";

        }

    }//function add()
    
    public function delete(){

        session_start();

        if(!isset($_SESSION['user'])){

          header('location:index.php');

        }else{

            if(isset($_POST['id'])){

              //session_start();
         
                $id= $_POST['id'];

                $total_order=0;
      
                foreach($_SESSION['shoppingCart'] as $key=>$item){
      
                    if($item['id']==$id){
      
                      unset($_SESSION['shoppingCart'][$key]);
                      $newCart=count($_SESSION['shoppingCart']);
      
                    }
      
                }

                foreach($_SESSION['shoppingCart'] as $key=>$item){

                    $total_order+= $item['price']*$item['quantity'];

                } 
            
                $response= new stdClass();
                 
                $response->total_order=$total_order;
                $response->newCart=$newCart;
            
                $json= json_encode($response); 

                echo $json;
      
            }

        }
         
        //header('location: index.php?c=cart&a=inbox');
        //$this->inbox();
        
    }//function delete()

    public function payment(){

        session_start();

        if(!isset($_SESSION['user'])){

          header('location:index.php');

        }else{

           require_once "views/pay.php";

        }
      
    }//function payment()

    public function login(){
    
        require_once "views/logIn.php";
    
    }//function login()
     
    public function register(){
    
        require_once "views/register.php";
        
    }//function register()

    public function test(){

        if($_POST['name']=="" && $_POST['mail']=="" && $_POST['pass']==""){

            header('location: index.php');

        }else{
        
            $name= $_POST['name'];
            $email= $_POST['mail'];
            $password= $_POST['pass'];
            $pass_encrypt= password_hash($password, PASSWORD_DEFAULT);
        
            $insert= new CartModel();
            $insert->user_data($name, $email, $pass_encrypt);
            header('location: index.php?c=cart&a=login'); 

        }
    
    }//function test()

    public function test_session(){
    
        $email= $_POST['mail'];
        $password= htmlentities(addslashes($_POST['pass']));

        $verify= new CartModel();
        $verify->check_session($email, $password);

    }//test_session()
    
    public function logout(){
    
        //require_once "controller/control/control_logout.php";
        session_start();
        session_destroy();
        header('location: index.php');

    }//logout()

    public function process(){

        session_start();

        if(!isset($_SESSION['user'])){

          header('location:index.php');

        }else{
        
        //session_start();
        
        $id= $_POST['id_user'];
        $name= $_POST['name_user'];
        $email= $_POST['email_user'];
        $purchase= $_POST['order_total'];
        $remain= $_POST['remain'];
    
        $insert= new CartModel();
        $insert->purchase($id, $name, $email, $purchase);

        $update= new CartModel();
        $update->update_wallet($id, $remain);
    
        $_SESSION['user']['wallet']=$remain;

        ///print_r($_SESSION['user']);
        //die();

        unset($_SESSION['shoppingCart']);
        header('location: index.php');

        }

    }//process()

    public function rate_item(){

        session_start();

        if(!isset($_SESSION['user'])){

          header('location:index.php');

        }else{
     
            if(isset($_POST['value'])){
        
              //session_start();

               $id_user= $_SESSION['user']['id'];
               $rate_user= $_POST['value'];
               $id_item= $_POST['id_item'];
               $name_item= $_POST['name_item'];

               $insert= new CartModel();
               $insert->item_rate($id_user, $id_item, $name_item, $rate_user);

               $update= new CartModel();
               $update->rating($id_item);
               header('location: index.php');

            }

        }
    
     }//rate_item finishes

    /*public function btn_plus(){

       require_once "controller/control/control_plus.php";

    }// btn_plus finishes

    public function btn_minus(){

        require_once "controller/control/control_minus.php";
 
     }//btn_plus finishes*/

    public function btn_change(){

        session_start();

        if(!isset($_SESSION['user'])){

           header('location:index.php');

        }else{
        
           require_once "controller/control/control_btn_change.php";

        }
 
    }//btn_change finishes

}//Class CartController finishes

?>