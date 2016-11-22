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
       
    <table border="1">
        <thead>
            <tr>
                <th>Название</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categori) :?>
            <tr>
                <td><?php echo $categori['name'] ?></td>
                <td><a href="/admin/category/edit/<?php echo $categori['id'] ?>">редактировать</a></td>
                <td><a href="/admin/category/delete/<?php echo $categori['id'] ?>" > удалить</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table><br>
    <a href="/admin/category/new" id="butt-submit">Новая категория</a>
</div>
</div>
<?php require_once '/views/layouts/footer.php';?>
