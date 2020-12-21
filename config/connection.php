<?php

class Connection{

    public static function Connect(){

        try{
    
            $pdo= new PDO("mysql:host=localhost;dbname=items","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET CHARACTER set utf8");

            return $pdo;

        }catch(Exception $e){

           echo "Error: " . $e->getMessage();
           die();

        }

    }

}

?>