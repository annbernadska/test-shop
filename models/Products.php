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
class Products {
    const SHOW_BY_DEFAULT=3;
    public static function getAllProducts($page=1) {
        $page = intval($page);
        $offset=($page-1)* self::SHOW_BY_DEFAULT;
        $limit=self::SHOW_BY_DEFAULT;
        $productList=array();        
        $db= Db::getConnection();
        $sql="select * from product where status='1' order by id desc limit :limit offset :offset";
        $result=$db->prepare($sql);
        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->bindParam(":offset", $offset, PDO::PARAM_INT);
        $result->execute();
            
        $i=0;
        while ($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['price']=$row['price'];
            $productList[$i]['category_id']=$row['category_id'];
            $productList[$i]['code']=$row['code'];
            $productList[$i]['description']=$row['description'];
            $i++;
        }
        return $productList;
        
    }
    public static function getAllProductsAdmin() {
        $db=Db::getConnection();
        $productList=array();
        $result=$db->query("select * from product order by category_id ");
        $i=0;
        while ($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['price']=$row['price'];
            $productList[$i]['category_id']=$row['category_id'];
            $productList[$i]['code']=$row['code'];
            $productList[$i]['status']=$row['status'];
            $productList[$i]['description']=$row['description'];
            $i++;
        }
        return $productList;
        
    }
    public static function getProductById($id) {
        $db=Db::getConnection();
        $result=$db->query("select * from product where id=$id");
        return $result->fetch();
        
    }
    
    public static function getImage($id) {
        $noImage='default.jpg';
        $path = '/template/img/products/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists ($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }else
            return $path . $noImage;
    }
    public static function getAllProductsByIds($ids){
        $productList=array();
        $db= Db::getConnection();
        $idString = implode(',', $ids);
        $sql="select * from product where status='1' and id in ($idString)";
        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while ($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['code']=$row['code'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['price']=$row['price'];
            $productList[$i]['category_id']=$row['category_id'];
            $productList[$i]['description']=$row['description'];
            $i++;
        }
        return $productList;
    }
    public static function  getTotalProductsInCategory($id){
        $db= Db::getConnection();
        $result=$db->query("select count(id) as count from product where status='1' and category_id = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row=$result->fetch();
        return $row['count'];
    }
    public static function getProductsByCategory($id=false,$page=1){
        if($id){
            $page = intval($page);
            $offset=($page-1)* self::SHOW_BY_DEFAULT;
            $limit=self::SHOW_BY_DEFAULT;
            $productList=array();
            $db= Db::getConnection();
            $sql="select * from product where category_id = :id and status='1' order by id desc limit :limit offset :offset";
            $result=$db->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->bindParam(":limit", $limit, PDO::PARAM_INT);
            $result->bindParam(":offset", $offset, PDO::PARAM_INT);
            $result->execute();
            $i=0;

            while($row=$result->fetch()){
                $productList[$i]['id']=$row['id'];
                $productList[$i]['name']=$row['name'];
                $productList[$i]['code']=$row['code'];
                $productList[$i]['price']=$row['price'];
                $productList[$i]['category_id']=$row['category_id'];
                $productList[$i]['description']=$row['description'];
                $i++;
            }
            return $productList;
        }else 
            return false;
        
    }
    
    public static function create( $name,$code,$price,$category_id,$description,$status) {
        $db= Db::getConnection();
        $sql="INSERT INTO product ( name, price, category_id, code, description, status) "
                . "VALUES ( :name, :price, :category_id, :code, :description, :status)";
        $result=$db->prepare($sql);
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":code", $code, PDO::PARAM_INT);
        $result->bindParam(":price", $price, PDO::PARAM_INT);
        $result->bindParam(":category_id", $category_id, PDO::PARAM_INT);
        $result->bindParam(":description", $description, PDO::PARAM_STR);
        $result->bindParam(":status", $status, PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
     }
     
     public static function edit( $id,$name,$code,$price,$category_id,$description,$status) {
        $db= Db::getConnection();
        $sql="UPDATE  product "
                . "set name=:name,code=:code,price=:price,category_id=:category_id,description=:description,status=:status"
                . " WHERE id = :id";
        $result=$db->prepare($sql);
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":code", $code, PDO::PARAM_INT);
        $result->bindParam(":price", $price, PDO::PARAM_INT);
        $result->bindParam(":category_id", $category_id, PDO::PARAM_INT);
        $result->bindParam(":description", $description, PDO::PARAM_STR);
        $result->bindParam(":status", $status, PDO::PARAM_INT);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        return $result->execute();
     }
     public static function delete($id) {
        $db= Db::getConnection();
        $sql="delete from product where id = :id";
        $result=$db->prepare($sql);
        $result->bindParam(":id", $id);
        return $result->execute();
    }
    public static function checkName($param) {
          if(mb_strlen($param)<3 || mb_strlen($param)>10){
              return false;
          }else {
              return true;
          }
      }
      public static function checkCode($param) {
          if(mb_strlen($param)<3){
              return false;
          }else {
              return true;
          }
      }
      public static function checkPrice($param) {
          if(is_numeric($param)){
              return true;
          }else {
              return false;
          }
      }
      public static function  getTotalProducts(){
        $db= Db::getConnection();
        $result=$db->query("select count(id) as count from product where status='1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row=$result->fetch();
        return $row['count'];
    }
}
