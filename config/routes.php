<?php
//Важно сверху длиннее путь!!!
return array(
    'feedback'=>'/site/feedback',
    'login'=>'/user/login',
    'register'=>'/user/register',
    'logout'=>'/user/logout',
    'catalog/view/([0-9]+)'=>'/catalog/view/$1',
    'catalog/([0-9]+)/page-([0-9]=)'=>'/catalog/category/$1/$2',
    'catalog/([0-9]+)'=>'/catalog/category/$1',
    'catalog'=>'/catalog/index',
    
    'order/delete/([0-9]+)'=>'/order/deleteOrder/$1',
    
    'cart/checkout'=>'/cart/checkout',
    'cart/addAjax/([0-9]+)'=>'/cart/addAjax/$1',
    'cart/delete/([0-9]+)'=>'/cart/delete/$1',
    'cart'=>'/cart/index',
    
    'admin/order'=>'/admin/order',
    
    'admin/category/new'=>'/admin/categoryNew',
    'admin/category/delete/([0-9]+)'=>'/admin/categoryDelete/$1',
    'admin/category/edit/([0-9]+)'=>'/admin/categoryEdit/$1',
    'admin/category'=>'/admin/category',
    
    'admin/products/new'=>'/admin/productsNew',
    'admin/products/delete/([0-9]+)'=>'/admin/productsDelete/$1',
    'admin/products/edit/([0-9]+)'=>'/admin/productsEdit/$1',
    'admin/products'=>'/admin/products',
    'admin'=>'/admin/index',
    
    ''=>'/site/index'//ControllerSite indexAction
    );