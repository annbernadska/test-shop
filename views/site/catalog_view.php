<?php require_once '/views/layouts/header.php';?>
<div id="content">
    <div id="product">
    <div id="img">
    <img src="<?php echo Products::getImage($product['id']) ?>" width="200"/>
    <br>
    </div>
    <center>
    
    <h3>Название: <?php echo($product['name']) ?></h3>
    <h3>Цена: <?php echo($product['price']) ?>грн</h3>
    <h3>Код: <?php echo($product['code']) ?></h3><br>
    <h4>Описание:</h4>
    <?php echo ($product['description']) ?><br><br>
    <a href="../">Вернутся в каталог</a>
    </center>
    </div>
    
   
</div>
<?php require_once '/views/layouts/footer.php';?>
