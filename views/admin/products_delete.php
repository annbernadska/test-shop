<?php require_once '/views/layouts/header.php'; ?>
<div id="admin-menu">
<ul>
        <li><a href="/admin/order">Заказы</a></li>
        <li> <a href="/admin/category">Категории</a></li>
        <li> <a href="/admin/products">Продукты</a></li>
</ul> 
</div>
<div id="content">
    <div id="product-admin">
    <?php if (isset($product)): ?>

        Действительно удалить продукт <?php echo $product['name']; ?>?
        <form method="post">
            <input type="submit" name="submit" value="Удалить" />
        </form>


    <?php endif; ?>
    </div>
</div>
<?php require_once '/views/layouts/footer.php'; ?>
