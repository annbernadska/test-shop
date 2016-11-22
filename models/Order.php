<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Anna
 */
class Order {
    public static function save($userName, $userPhone, $userAddres, $userId=false, $products) {
        $productsJson = json_encode($products);
        $db = Db::getConnection();
        $sql = 'INSERT INTO user_order (user_name, user_phone, user_addres, user_id, products) VALUES (:user_name, :user_phone, :user_addres, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_addres', $userAddres, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $productsJson, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function getOrders() {
        $db = Db::getConnection();
        $sql = 'select *from user_order order by id desc';
        $result=$db->query($sql);
        $orders= array();
        $i=0;
        while($row=$result->fetch()){
            $orders[$i]['user_name']=$row['user_name'];
            $orders[$i]['user_phone']=$row['user_phone'];
            $orders[$i]['user_addres']=$row['user_addres'];
            $orders[$i]['user_id']=$row['user_id'];
            $orders[$i]['products'] = json_decode($row['products']);
            $orders[$i]['id'] = json_decode($row['id']);
            $i++;
        }
        return $orders;
    }
    public static function deleteOrder($id) {
        $db = Db::getConnection();
        $sql = 'delete from user_order where id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function checkName($param) {
         if(mb_strlen($param)<3){
             return false;
         }return true;
     }
     public static function checkAddres($param) {
         if(mb_strlen($param)<6){
             return false;
         }return true;
     }
     public static function checkPhone($param) {
         if(mb_strlen($param)<7){
             return false;
         }return true;
     }
}
