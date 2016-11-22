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
    <?php if(isset($product)):?>
    
    Редактировать:
    <form  method="post" enctype="multipart/form-data">
        Имя<br>
        <input type="text" name="name" value="<?php echo $product['name'];?>" /><br>
        Код<br>
        <input type="text" name="code" value="<?php echo $product['code'];?>" /><br>
        Цена<br>
        <input type="text" name="price" value="<?php echo $product['price'];?>" /><br>
        
        Категория<br>
        <select name="category_id">
            <?php foreach ($caterories as $value):?>
            <option value="<?php echo $value['id'];?>" <?php echo ($value['id']==$product['category_id'])? "selected" :""?>>
                <?php echo $value['name'];?> 
            </option> 
            <?php endforeach;?>
        </select><br>
        
        
        Описание<br>
        <textarea name="description" rows="10" cols="80"><?php echo $product['description'];?></textarea><br>
        
        Отображение<br>
        <input type="radio" name="status" value="1" <?php echo ('1'==$product['status'])? "checked" :""?>/> Да<br>
        <input type="radio" name="status" value="0" <?php echo ('0'==$product['status'])? "checked" :""?>/> Нет<br>
        Фото<br>
        <img src="<?php echo Products::getImage($product['id'])?>" width="100"/><br>
        Изменить<br>
        <input type="file" name="image" placeholder="" value=""><br>
        <br>
        <?php if(isset($errors) && is_array($errors)):?>
            <?php foreach ($errors as $error):?>
            <h6 id="errors"><?php echo $error;?></h6>
            <?php endforeach;?>
            <?php endif;?>
        <input type="submit" name="submit" value="Редактировать" />
    </form>
    
    <?php endif;?>
    </div>
</div>
<?php require_once '/views/layouts/footer.php';?>