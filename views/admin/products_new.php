<?php require_once '/views/layouts/header.php';?>
<div id="admin-menu">
<ul>
        <li><a href="/admin/order">Заказы</a></li>
        <li> <a href="/admin/category">Категории</a></li>
        <li> <a href="/admin/products">Продукты</a></li>
</ul> 
</div>
<div id="content">
    <div id="product-admin">
    
    Вветите название:
    <form  method="post" enctype="multipart/form-data">
        Имя<br>
        <input type="text" name="name" value="" /><br>
        Код<br>
        <input type="text" name="code" value="" /><br>
        Цена<br>
        <input type="text" name="price" value="" /><br>
        Категория<br>
        <select name="category_id">
            <?php foreach ($caterories as $value):?>
            <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
            <?php endforeach;?>
        </select><br>
        Описание<br>
        <input type="text" name="description" value="" /><br>
        Отображение<br>
        <input type="radio" name="status" value="1" checked/> Да<br>
        <input type="radio" name="status" value="0" /> Нет<br>
        Фото<br>
        <input type="file" name="image" placeholder="" value=""><br>
            <?php if(isset($errors) && is_array($errors)):?>
            <?php foreach ($errors as $error):?>
            <h6 id="errors"><?php echo $error;?></h6>
            <?php endforeach;?>
            <?php endif;?>
        <input type="submit" name="submit" value="Добавить" /><br>
    </form>
    

    </div>
</div>
<?php require_once '/views/layouts/footer.php';?>
