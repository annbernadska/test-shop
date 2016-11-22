<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderController
 *
 * @author Anna
 */
class OrderController {
    public static function actionDeleteOrder($id) {
        $result=Order::deleteOrder($id);
        if($result){
            header("Location: /admin/order");
        }
    }
}
