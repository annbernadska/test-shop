<?php require_once '/views/layouts/header.php';?>
<div id="admin-menu">
<ul>
        <li><a href="/admin/order">Заказы</a></li>
        <li> <a href="/admin/category">Категории</a></li>
        <li> <a href="/admin/products">Продукты</a></li>
</ul> 
</div>
<div id="content">
       <div id="category">
    
    Введите название:
    <form method="post">
        <input type="text" name="name" placeholder="Название" value="" /><br>
            <?php if(isset($errors) && is_array($errors)):?>
            <?php foreach ($errors as $error):?>
            <h6 id="errors"><?php echo $error;?></h6>
            <?php endforeach;?>
            <?php endif;?>
        <input type="submit" name="submit" value="Добавить" />
    </form>
    

       </div>
</div>
<?php require_once '/views/layouts/footer.php';?>
