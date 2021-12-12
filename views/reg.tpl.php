<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageData['title'] ?></title>
</head>
<body>
<form class="form-signin" id='ajax_form' action=""  method="POST" >
<?php if(!empty($pageData['registerMsg'])) :?>
                        <p><?php echo $pageData['registerMsg']; ?></p>
                    <?php endif; ?>
            <input type="text" class="form-control" placeholder="login"  name="login" id="#login" >
            <input type="password" class="" placeholder="Password"  name ="password" id="#password" >
            <input type="password" class="" placeholder="Password"   name ="password2" id="#password2">
            <input type="email" class="form-control" placeholder="email"  name ="email" id="#email">
            <input type="text" class="form-control" placeholder="name"  name="name" id="#name" > 
            <button class="btn btn-lg btn-primary btn-block" id="btn" type="submit" 
                disabled>
                    Регистрация</button>  
                </form>
<div id="result_form"><div> 
<div> <a href="/">Авторизация</a> </div>
<noscript><p>Ваш браузер не поддерживает скрипты!</p></noscript>
<script src="/js/jquery.min.js"></script>
<script src="/js/regAjax.js"></script>
</body>
</html>