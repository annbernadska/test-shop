<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatalogController
 *
 * @author Anna
 */
class CatalogController {
   public function actionIndex($page=1) { 
       $pagination=false;
       $category=false;
       $categories=array();
       $categories= Categories::getAllCategories();
       
       $page=strtok ($page, "page-");
       $total= Products::getTotalProducts();
       $pagination = new Pagination($total,$page, Products::SHOW_BY_DEFAULT,'page-');
       $products=array();
       $products=Products::getAllProducts($page);
       
       require_once (ROOT.'/views/site/catalog.php'); 
       return true;
    }
    public function actionView($id) {
       $product= Products::getProductById($id);
       require_once (ROOT.'/views/site/catalog_view.php'); 
       return true;
    }
    
    public function actionCategory($id, $page=1) {
       $page=strtok ($page, "page-");
       $total=Products::getTotalProductsInCategory($id);
       $pagination = new Pagination($total,$page, Products::SHOW_BY_DEFAULT,'page-');
       
       $categories=array();
       $categories= Categories::getAllCategories();
       
       $products=array();
       $products=Products::getProductsByCategory($id,$page);
       
       $category=Categories::getCategoriById($id);
       require_once (ROOT.'/views/site/catalog.php'); 
       return true;
    }
}
