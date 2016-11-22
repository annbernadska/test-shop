<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *
 * @author Anna
 */
class Categories {
    
    public static function getAllCategories() {
        $db=Db::getConnection();
        $category=array();
        $result=$db->query("select * from category");
        $i=0;
        while ($row=$result->fetch()){
            $category[$i]['id']=$row['id'];
            $category[$i]['name']=$row['name'];
            $i++;
        }
        return $category;
        
    }
    public static function getCategoriById($id) {
        $db= Db::getConnection();
        $sql="select * from category where id = :id";
        $result=$db->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        $row=$result->fetch();
        return $row['name'];
    }
    public static function delete($id) {
        $db= Db::getConnection();
        $sql="delete from category where id = :id";
        $result=$db->prepare($sql);
        $result->bindParam(":id", $id);
        return $result->execute();
    }
    public static function edit($id, $name) {
        $db= Db::getConnection();
        $sql="UPDATE category SET name = :name WHERE id = :id";
        $result=$db->prepare($sql);
        $result->bindParam(":id", $id);
        $result->bindParam(":name", $name);
        return $result->execute();
    }
     public static function create( $name) {
        $db= Db::getConnection();
        $sql="INSERT INTO category ( name) VALUES ( :name)";
        $result=$db->prepare($sql);
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        return $result->execute();
     }
      public static function checkName($name) {
          if(mb_strlen($name)<3 || mb_strlen($name)>10){
              return false;
          }else {
              return true;
          }
      }
}
