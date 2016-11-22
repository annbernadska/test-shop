<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author Anna
 */
class Cart {
    public static function addProduct($id) {
        $id= intval($id);
        $productInCart=array();
        if(isset($_SESSION['products'])){
            $productInCart=$_SESSION['products'];
        }
        if(array_key_exists($id, $productInCart)){
            $productInCart[$id]++;
        }else{
            $productInCart[$id]=1;
        }
        $_SESSION['products']=$productInCart;
        return self::countItems();
    }
    public static function countItems(){
        if(isset($_SESSION['products'])){
            $count=0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count=$count+$quantity;
            }
            return $count;
        }else{
            return 0;
        }
    }
    public static function getProductsinCart(){
        if(isset($_SESSION['products'])){
            return $_SESSION['products'];
        }else
            return false;
    }
    public static function getTotalPrice($products){
        $price=0;
        foreach ($products as $item) {
           $price+= $item['price']*$_SESSION['products'][$item['id']];
        }
        return $price;
    }
     public static function deleteProducts($id) {
         $idP= intval($id);
            if(isset($_SESSION['products'])){
                unset($_SESSION['products'][$idP]);
            }
     }
     public static function getProducts() {
         if(isset($_SESSION['products'])){
             return $_SESSION['products'];
         }else 
             return false;
    }
     public static function clear() {
         if(isset($_SESSION['products'])){
         unset($_SESSION['products']);
         }
     }
}
