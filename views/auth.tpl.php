<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageData['title'] ?></title>
</head>
<body>
<form class="form-signin" id='ajax-form' action=""  method="POST">
<?php if(!empty($pageData['error'])) :?>
                        <p><?php echo $pageData['error']; ?></p>
                    <?php endif; ?>
                <input type="text" class="form-control" placeholder="login" name="login" required autofocus>
                <input type="password" class="" placeholder="Password" name ="password"required>
                <button class="btn btn-lg btn-primary btn-block" id="btn" type="submit" 
                disabled>
                    Авторизация</button>  
                </form>
<div  id="result"></div>
 <a href="reg">Регистрация</a>
 <noscript><p>Ваш браузер не поддерживает скрипты!</p></noscript>
<script src="/js/jquery.min.js"></script>
<script src="/js/authAjax.js"></script>
</body>
</html>