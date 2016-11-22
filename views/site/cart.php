<?php require_once '/views/layouts/header.php'; ?>

<div id="content">
<div id="cart">
<?php if ($productsInCart): ?>
    <h2>Вы выбрали такие товары:</h2><br>
    <table >
        <tr>
            <th>Код товара</th>
            <th>Название</th>
            <th>Стомость, грн</th>
            <th>Количество, шт</th>
            <th>Удалить</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['code']; ?></td>
                <td>
                    <a href="/catalog/view/<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?>
                    </a>
                </td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $productsInCart[$product['id']];?></td>                        
                <td>
                    <a href="/cart/delete/<?php echo $product['id']; ?>">
                       Удалить
                    </a>
                </td>                        
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">Общая стоимость, грн:</td>
            <td><?php echo $totalPrice; ?></td>
        </tr>

    </table>
    <br>
    <a href="/cart/checkout" id="butt-submit"> Оформить заказ</a>
    <br>
<?php else: ?>
    <h2>Корзина пуста</h2>
<?php endif; ?>
</div>
</div>


<?php require_once '/views/layouts/footer.php'; ?>
