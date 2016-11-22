<?php require_once '/views/layouts/header.php'; ?>
<div id="admin-menu">
<ul>
        <li><a href="/admin/order">Заказы</a></li>
        <li> <a href="/admin/category">Категории</a></li>
        <li> <a href="/admin/products">Продукты</a></li>
</ul> 
</div>

<div id="order">
    <?php if(!empty($orders)):?>
    <h2>Новые заказы:</h2><br>
    <table>
        <tr>
            <th>Имя заказчика</th>
            <th>Телефон</th>
            <th>Адресс</th>
            <th>Товары</th>
            <th>Удалить</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['user_name']; ?></td>
                <td><?php echo $order['user_phone']; ?></td>
                <td><?php echo $order['user_addres']; ?></td>
                <td>
                    <ul >
                    <?php foreach ($order['products'] as $key => $value):?>
                        <li>Код: <?php echo Products::getProductById($key)['code']?><br>Количество: <?php echo $value?></li>
                    <?php endforeach;?>
                    </ul>   
                </td>
                                 
                <td>
                    <a href="/order/delete/<?php echo $order['id']; ?>">
                       удалить
                    </a>
                </td>                        
            </tr>
        <?php endforeach; ?>
    </table>
    <?php else:?>
    <h2>Заказов нет</h2><br>
    <?php endif;?>
    
    
</div>



<?php require_once '/views/layouts/footer.php'; ?>
