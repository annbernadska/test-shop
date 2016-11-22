<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author Anna
 */
class UserController {
    
     
   public function actionLogin() {
        $name='';
        $password='';
        if(isset($_POST['submit'])){
            $name=$_POST['login'];
            $password=$_POST['password'];
            $userId = User::checkUserData($name,$password);
            
            if($userId){
                 User::auth($userId);
            }else{
                $error='Неверный логин или пароль';
            }
        }
        require_once (ROOT.'/views/site/index.php'); 
        return true;
    }
    public function actionLogout() {
        
        unset($_SESSION['user']);
        header("Location: /");
        return true;
    }
     public function actionRegister() {
        $result=false;
        $name='';
        $password='';
        $email='';
        $phone='';
        $addres='';
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $addres=$_POST['addres'];
            
            $errors=false;
            if(!User::checkName($name)){
                     $errors[]='Введите имя от 3 до 10 символов';
            }
            if(!User::checkAddres($addres)){
                     $errors[]='Слишком короткий адрес';
            }
            if(!User::checkPhone($phone)){
                     $errors[]='Слишком короткий номер телефона';
            }
            if(!User::checkPassword($password)){
                     $errors[]='Слишком короткий пароль';
            }
            if(!User::checkEmail($email)){
                     $errors[]='Некоректный емейл';
            }
            if(!User::checkEmailExist($email)){
                     $errors[]='Такой емейл уже существует';
            }
            if($errors==false){
                $result=User::register($name,$password,$email,$phone,$addres);
            }
            
        }
        
        
        require_once (ROOT.'/views/site/register.php'); 
        return true;
     }
}
