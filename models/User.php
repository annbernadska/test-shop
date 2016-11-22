<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Anna
 */
class User {
    public static function checkUserData($email,$password) {
        $db= Db::getConnection();
        $sql = 'select * from user where email = :email and password = :password';
        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user=$result->fetch();
        if($user){
            return $user['id'];
        }return false;
    }
    public static function auth($userId) {
        $_SESSION['user']=$userId;
    }
    public static function isGuest() {
        if(isset($_SESSION['user'])){
            return false;
        }return true;
    }
    
    public static function getUserById($id) {
        $db= Db::getConnection();
        $sql = 'select * from user where id = :id';
        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $user=$result->fetch();
        if($user){
            return $user;
        }return false;
    }
     public static function register($name,$password,$email,$phone,$addres) {
         $db= Db::getConnection();
         $sql="insert into user (name, email, password, phone, addres) values (:name, :email, :password, :phone, :addres)";
         $result=$db->prepare($sql);
         $result->bindParam(":name", $name, PDO::PARAM_STR);
         $result->bindParam(":email", $email, PDO::PARAM_STR);
         $result->bindParam(":password", $password, PDO::PARAM_STR);
         $result->bindParam(":phone", $phone, PDO::PARAM_INT);
         $result->bindParam(":addres", $addres, PDO::PARAM_STR);
         return $result->execute();
     }
     public static function isAdmin() {
         if(isset($_SESSION['user'])){
             $id=$_SESSION['user'];
             $db= Db::getConnection();
            $result=$db->query("select * from user where id=$id and role='1'");
            if($result->fetch()){
                return true;
            }else {
                return false;
            }
         }return false;
         
     }
     
     public static function checkName($param) {
         if(mb_strlen($param)<3 || mb_strlen($param)>10){
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
     public static function checkPassword($param) {
         if(mb_strlen($param)<4){
             return false;
         }return true;
     }
     public static function checkEmail($param) {
         if(filter_var($param, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
     }
     public static function checkEmailExist($param) {
        $db = Db::getConnection();
        $sql = 'select count(*) from user where email = :email';
        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn()) {//есть ли записи? 
            return true;
        }else{
        return false;
        }
     }
}
