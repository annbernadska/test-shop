<?php require_once '/views/layouts/header.php';?>

<div id="content">
    <div id="feedback">
        <?php if(!$result):?>
        <h1>Напишите нам</h1><br>
        <form name="feedback" method="POST">
            <input type="text" name="email" placeholder="email" /><br>
            <input type="text" name="subject" placeholder="Тема" /><br>
            <textarea name="text" rows="4" cols="20" >Сообщение</textarea><br>
            <?php if(isset($errors) && is_array($errors)):?>
            <?php foreach ($errors as $error):?>
            <h6><?php echo $error;?></h6>
            <?php endforeach;?>
            <?php endif;?>
            <input type="submit" name="submit" value="Отправить" /><br>
        </form>
        <?php else :?>
        <h1>Спасибо, мы вам ответим.</h1><br>
        <?php endif;?>
    </div>
</div>
<?php require_once '/views/layouts/footer.php';?>
