<?php
class Database{
    public static $connection;
    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("localhost", "root", "Shan_200630103728", "uni-eshop","3306");
        }
    }
    public static function Iud($q){
        Database::setUpConnection();
        Database::$connection->query($q);
    }
    public static function search($q){
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}