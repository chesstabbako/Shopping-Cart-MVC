<?php

class CartModel{

private $db;
private $content;

    public function __construct(){

       require_once "config/connection.php";
       $this->db= Connection::Connect();
       $this->content= array();
 
    }//__construct() finishes

    public function get_items(){
        
        $sql= "select * from `cart`";
        $result= $this->db->prepare($sql);
        $result->execute();
        
        while($row= $result->fetchAll(PDO::FETCH_ASSOC)){
        
           $this->content[] = $row;
        
        }

        return $this->content;
 
    }//get_items() finishes

    public function user_data($name, $email, $password){
        
        $sql= "INSERT INTO `users` 
        (`name`, `email`, `password`, `wallet`) 
        VALUES (:u_name,:u_email,:u_password,'100')";
        
        $result= $this->db->prepare($sql);
        $result->bindValue(":u_name", $name);
        $result->bindValue(":u_email", $email);
        $result->bindValue(":u_password", $password);
        $result->execute();
        
    }// user_data($name, $email, $password) finishesss

    public function check_session($email, $password){
        
        $arrayC= [];
        $counter=0;
        $sql= "SELECT * FROM `users` 
        WHERE `email`=:u_email";

        $result= $this->db->prepare($sql);
        $result->bindValue(":u_email", $email);
        $result->execute();
        
        while($row= $result->fetchAll(PDO::FETCH_ASSOC)){
          
            //print_r($row[0]['password']);
            //die();
        
            if(password_verify($password, $row[0]['password'])){
            
               $counter= $counter + 1;

            }

            $arrayC[]=$row;
            
        }
         
        //print_r($arrayC[0][0]['name']);
        //die();

        if($counter==1){

           session_start();
        
           $_SESSION['user']= array(
                   
               "id"=>$arrayC[0][0]['id'],
               "name"=>$arrayC[0][0]['name'],
               "email"=>$arrayC[0][0]['email'],
               "wallet"=>$arrayC[0][0]['wallet'],

           );

           header('location:index.php'); 

        }else{

            header('location:index.php?c=cart&a=login');

        }

        //print_r($_SESSION['user']);
        //die();

    }//check_session($email, $password)

    public function purchase($id, $name, $email, $purchase){

        $sql= "INSERT INTO `purchases` 
        (`id_user`, `time`, `email_user`, `name_user`, `total_purchase`)
         VALUES (:id_user, now(), :email_user, :name_user, :total_purchase)";
        
        $result= $this->db->prepare($sql);
        $result->bindValue(":id_user", $id);
        $result->bindValue(":email_user", $email);
        $result->bindValue(":name_user", $name);
        $result->bindValue(":total_purchase", $purchase);
        $result->execute();

    }// purchase finishesss

    public function update_wallet($id, $remain){

        $sql= "UPDATE `users` 
        SET `wallet` = :user_wallet 
        WHERE `users`.`id` = :id_user";
        
        $result= $this->db->prepare($sql);
        $result->bindValue(":id_user", $id);
        $result->bindValue(":user_wallet", $remain);
        $result->execute();

    }// update_wallet finishes

    public function item_rate($id_user, $id_item, $name_user, $rate_user){
    
        $sql= "INSERT INTO `rating` 
        (`id_user`, `id_item`, `name_item`, `rate_item`) 
        VALUES (:id_user, :id_item , :name_item, :rate_item)";
        
        $result= $this->db->prepare($sql);
        $result->bindValue(":id_user", $id_user);
        $result->bindValue(":id_item", $id_item);
        $result->bindValue(":name_item", $name_user);
        $result->bindValue(":rate_item", $rate_user);

        $result->execute();

    }// item_rate finishes

    public function rating($id_item){
        
        $sql="UPDATE `cart` 
        SET `rating` = (SELECT AVG(rate_item) 
        FROM `rating`
        WHERE `rating`.`id_item`=:id_item) 
        WHERE `cart`.`id` = :id_item";

        $result= $this->db->prepare($sql);
        $result->bindValue(":id_item", $id_item);
        $result->execute();

    }// rating($id_item) finishes

}
