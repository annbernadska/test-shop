<?php require_once '/views/layouts/header.php';?>

<div id="content">
    <div id="checkout">
        <?php if(!$result):?>
        <h1>Введите свои данные</h1><br>
        <form name="feedback" method="POST">
            <input type="text" name="name" placeholder="Имя" value="<?php echo(isset($user))?$name:'name' ?>" /><br>
            <input type="text" name="addres" placeholder="Адресс" value="<?php echo(isset($user))?$addres:'addres' ?>" /><br>
            <input type="text" name="phone" placeholder="Телефон" value="<?php echo(isset($user))?$phone:'phone' ?>" /><br>
            <?php if(isset($errors) && is_array($errors)):?>
            <?php foreach ($errors as $error):?>
            <h6><?php echo $error;?></h6>
            <?php endforeach;?>
            <?php endif;?>
            <input type="submit" name="submit" value="Отправить" /><br>
        </form>
        <?php else:?>
        <h1>Мы вам перезвоним.</h1><br>
        <?php endif;?>
    </div>
</div>
<?php require_once '/views/layouts/footer.php';?>
