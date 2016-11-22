<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Anna
 */
class AdminController {
    public function actionIndex() {
        
        $admin=false;
        $admin=User::isAdmin(); 
         if($admin){
             require_once (ROOT.'/views/site/admin.php'); 
             return true;
         }else{
             header("Location: /");
         }
      
    }
    public function actionOrder() {
        if(User::isAdmin()){
            $orders=Order::getOrders();
            require_once (ROOT.'/views/admin/order.php'); 
            return true;
        }else{
            header("Location: /");
        }
       
    }
    
    
    public function actionCategory() {
         if(User::isAdmin()){
                 $categories= Categories::getAllCategories();
                 require_once (ROOT.'/views/admin/category.php'); 
                 return true;
         }
         else{
             header("Location: /");
         }
    
    }
    public function actionCategoryDelete($id) {
        if(User::isAdmin()){
            if(isset($_POST['submit'])){
                $result=Categories::delete($id);
                if($result){
                    header("Location: /admin/category");
                }
            }else{
                $confirmCategory= Categories::getCategoriById($id);
                require_once (ROOT.'/views/admin/category_delete.php'); 
                return true;
            }
        }
             else{
                 header("Location: /");
             }
    }
    public function actionCategoryEdit($id) {
        if(User::isAdmin()){
            if(isset($_POST['submit'])){
                $errors=false;
                $name=$_POST['name'];
                if(!Categories::checkName($name)){
                   $errors[]='Введите название от 3 до 10 символов'; 
                }
                if($errors==false){
                    $result=Categories::edit($id,$name);
                }
                if(isset($result)){
                    header("Location: /admin/category");
                }
            }
                
                $confirmCategory= Categories::getCategoriById($id);
                require_once (ROOT.'/views/admin/category_edit.php'); 
                return true;
        }
             else{
                 header("Location: /");
             }
    }
    public function actionCategoryNew() {
        if(User::isAdmin()){
            if(isset($_POST['submit'])){
                $errors=false;
                $name=$_POST['name'];
                if(!Categories::checkName($name)){
                   $errors[]='Введите название от 3 до 10 символов'; 
                }
                if($errors==false){
                    $result=Categories::create($name);
                }
                if(isset($result)){
                    header("Location: /admin/category");
                }
            }
                require_once (ROOT.'/views/admin/category_new.php'); 
                return true;
            
        }
             else{
                 header("Location: /");
             }
    }
    
    
    public function actionProducts() {
         if(User::isAdmin()){
                 $products= Products::getAllProductsAdmin();
                 require_once (ROOT.'/views/admin/products.php'); 
                 return true;
         }
         else{
             header("Location: /");
         }
    
    }
    public function actionProductsDelete($id) {
        if(User::isAdmin()){
            if(isset($_POST['submit'])){
                $result= Products::delete($id);
                if($result){
                    header("Location: /admin/products");
                }
            }else{
                $product= Products::getProductById($id);
                require_once (ROOT.'/views/admin/products_delete.php'); 
                return true;
            }
        }
             else{
                 header("Location: /");
             }
    }
    public function actionProductsEdit($id) {
        if(User::isAdmin()){
             $caterories= Categories::getAllCategories();
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $code=$_POST['code'];
                $price=$_POST['price'];
                $category_id=$_POST['category_id'];
                $description=$_POST['description'];
                $status=$_POST['status'];
                
                 $errors=false;
                if(!Products::checkName($name)){
                   $errors[]='Введите название от 3 до 10 символов'; 
                }
                if(!Products::checkCode($code)){
                   $errors[]='Слишком короткий код'; 
                }
                if(!Products::checkPrice($price)){
                   $errors[]='Некоректная цена'; 
                }
                if($errors==false){
                    $result=Products::edit($id,$name,$code,$price,$category_id,$description,$status);
                }
                
                
                if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                      //move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                        $folder = "template/img/products/{$id}.jpg";
                        move_uploaded_file($_FILES["image"]["tmp_name"], $folder);
                }
                if (isset($result)){
                    if($result){
                        header("Location: /admin/products");
                    }
                }
            }
                $product= Products::getProductById($id);
                require_once (ROOT.'/views/admin/products_edit.php'); 
                return true;
            
        }
             else{
                 header("Location: /");
             }
    }
    public function actionProductsNew() {
        if(User::isAdmin()){
            $caterories= Categories::getAllCategories();
            if(isset($_POST['submit'])){ 
                $name=$_POST['name'];
                $code=$_POST['code'];
                $price=$_POST['price'];
                $category_id=$_POST['category_id'];
                $description=$_POST['description'];
                $status=$_POST['status'];
                
                $errors=false;
                if(!Products::checkName($name)){
                   $errors[]='Введите название от 3 до 10 символов'; 
                }
                if(!Products::checkCode($code)){
                   $errors[]='Слишком короткий код'; 
                }
                if(!Products::checkPrice($price)){
                   $errors[]='Некоректная цена'; 
                }
                if($errors==false){
                    $result= Products::create($name,$code,$price,$category_id,$description,$status);
                }
                
                if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                      //move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                        $folder = "template/img/products/{$result}.jpg";
                        move_uploaded_file($_FILES["image"]["tmp_name"], $folder);
                }
                if(isset($result))
                    if($result)
                        header("Location: /admin/products");
                
            }
                require_once (ROOT.'/views/admin/products_new.php'); 
                return true;
            
        }
             else{
                 header("Location: /");
             }
    }
}
