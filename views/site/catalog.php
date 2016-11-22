<?php require_once '/views/layouts/header.php'; ?>

<div id="catalog">
    <div id="categories">
        <?php foreach ($categories as $categori) : ?>
            <a href="/catalog/<?= $categori['id'] ?>"><?= $categori['name'] ?></a><br><br>
        <?php endforeach; ?>

    </div>
    <div id="prodcuts">
        <?php if ($category): ?>
            <h2><center><?php echo $category; ?></center></h2>
        <?php else: ?>
            <h2><center>Новинки</center></h2>
        <?php endif; ?>
        <?php foreach ($products as $product): ?>
            <div id="item">
                <div id="item_img">
                    <img src="<?php echo Products::getImage($product['id']) ?>" width="150"/>
                </div>
                
                 <div id="item_bottom">
                <h2><a href="/catalog/view/<?= $product['id'] ?>"><?= $product['name'] ?></a></h2>
                <h4><?= $product['price'] ?>грн</h4>
                <a href="#" class="add-to-cart" data-id="<?php echo $product['id']; ?>" > В корзину </a>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if($pagination){
            echo $pagination->get(); 
        }?>
    </div>
   
</div>
<?php require_once '/views/layouts/footer.php'; ?>
