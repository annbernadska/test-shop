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
       <br>
       <a href="/admin/products/new" id="butt-submit">Новый продукт</a>
    <table border="1">
        <thead>
            <tr>
                <th>Код</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) :?>
            <tr>
                <td><?php echo $product['code'] ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo Categories::getCategoriById($product['category_id']) ?></td>
                <td><?php echo $product['description'] ?></td>
                <td><?php echo ($product['status']==1 ? 'отображается' :  'не отображается'); ?></td>
                <td><a href="/admin/products/edit/<?php echo $product['id'] ?>">edit</a></td>
                <td><a href="/admin/products/delete/<?php echo $product['id'] ?>" > delete</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
</div>
</div>
<?php require_once '/views/layouts/footer.php';?>
