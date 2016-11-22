<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test-shop</title>
        <link href="/template/css/style.css" rel="stylesheet" type="text/css">
        <script src="/template/js/jquery.js"></script>
		<link rel="shortcut icon" href="/template/img/favicon.ico" type="image/x-icon">
    </head>
    <body>
         <div id="wrap">
        <div id="header">
            <div id="logo"> <img src="/template/img/logo.png" width="184" height="100" alt="logo"/>
            </div>
            <?php if(User::isGuest()) :?>
            <div id="logIn">
                <form action="/login" name="login" method="POST">
                    <input type="email" name="login" placeholder="email" /><br>
                    <input type="password" name="password" placeholder="password" /><br>
                    <?php if(isset($error)):?>
                    <h6><?php echo $error;?></h6>
                    <?php endif;?>
                    <input type="submit" name="submit" id="buttonLog" value="Войти" />
                    <a href="/register">Регистрация</a>
                    
                </form>

            </div>
            <?php else:?>
            <div id="logOut">
            Добрый день, <?php echo User::getUserById($_SESSION['user'])['name']?>!<br>
            <a href="/logout">Выйти</a>
            </div>
            <?php endif;?>
            
        </div>
        <div id="menu">

                <a href="/">Главная</a>
                <a href="/catalog">Каталог</a>
                <a href="/feedback">Обратная связь</a>
                <?php if(User::isAdmin()):?>
                 <a href="/admin">Панель администратора</a>
                 <?php endif;?>
                

            
        </div>
        <div id="bucket">
                <a href="/cart" id="right">Корзина (<span id="cart-count"><?php echo Cart::countItems();?></span>)</a>
        </div>