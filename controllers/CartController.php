<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CartController
 *
 * @author Anna
 */
class CartController {
    public function actionIndex() {
       $productsInCart=false;
       $productsInCart= Cart::getProductsinCart();
       if(!empty($productsInCart)){
           $productsIds= array_keys($productsInCart);
           $products= Products::getAllProductsByIds($productsIds); 
           $totalPrice=Cart::getTotalPrice($products);
       }
        require_once (ROOT.'/views/site/cart.php'); 
        return true;
    }
    
    public function actionAddAjax($id) {
         echo Cart::addProduct($id);
         return true;
    }
    
     public function actionDelete($id) {
        Cart::deleteProducts($id);
        header("Location: /cart");
     }
     
      public function actionCheckout() {
          $name='';
          $addres='';
          $phone='';
          $user=false;
          $result=false;
          if(!User::isGuest()){
            $user= User::getUserById($_SESSION['user']);
            $name= $user['name'];
            $addres= $user['addres'];
            $phone= $user['phone'];
        }
         if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $addres=$_POST['addres'];
          $phone=$_POST['phone'];
          $productsInCart= Cart::getProducts();
          $errors=false;
          if(!Order::checkName($name)){
                     $errors[]='Слишком короткое имя';
            }
            if(!Order::checkAddres($addres)){
                     $errors[]='Слишком короткий адрес';
            }
            if(!Order::checkPhone($phone)){
                     $errors[]='Слишком короткий номер телефона';
            }
            if($errors==false){
                $result=Order::save($name, $phone, $addres, $user['id'], $productsInCart);
                
            }
          if($result){
                    $adminMail='ani-ani@i.ua';
                    $message='orders';
                    $subject='Новый закаказ';
                   // mail($adminMail,$subject,$message);
                    Cart::clear();
                    require_once (ROOT.'/views/site/cart_checkout.php'); 
                    return true;
          }
         }
        require_once (ROOT.'/views/site/cart_checkout.php'); 
        return true;
        
      }
}
