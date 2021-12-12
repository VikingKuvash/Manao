<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageData['title'] ?></title>
</head>
<body>
<h1>Привет пользователь: <?php echo $_SESSION['User']['name'] ?></h1>
<a class="menu__link" href="/cabinet/logout">Выход</a>
<script src="/js/jquery.min.js"></script>
</body>
</html>