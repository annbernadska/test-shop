<?php require_once '/views/layouts/header.php';?>



<div id="content">
    <div id="register">
        <?php if(!$result):?>
        <h1>Регистрация</h1><br>
        <form name="feedback" method="POST">
            <input type="email" name="email" placeholder="email" /><br>
            <input type="password" name="password" placeholder="Пароль" /><br>
            <input type="text" name="name" placeholder="Имя" /><br>
            <input type="text" name="addres" placeholder="Адрес" /><br>
            <input type="text" name="phone" placeholder="Телефон" /><br>
            <?php if(isset($errors) && is_array($errors)):?>
            <?php foreach ($errors as $error):?>
            <h6><?php echo $error;?></h6>
            <?php endforeach;?>
            <?php endif;?>
            <input type="submit" name="submit" value="Отправить" /><br>
        </form>
        <?php else :?>
        <h1>Благодарим за регистрацию, теперь вы можете войти.</h1><br>
        <?php endif;?>
    </div>
</div>
<?php require_once '/views/layouts/footer.php';?>
