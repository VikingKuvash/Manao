<?php
class IndexModel extends Model{

 
   public  function checkUser () {
     
       $login  = $_POST['login'];
       $password = md5($_POST['password']);
 

       $login = mb_strtolower(trim($login));
       $password =  trim($password);

       //Подключение к нашей "БД"
       $baseRead = $this->ReadBase();
        
       //хранится номер авторизованного человека
        $currentBucket = false; 

       if(isset($baseRead['email'][$login])){ 
         $currentBucket = $baseRead['email'][$login]; // email = login
       } elseif(isset($baseRead['login'][$login])){
           $currentBucket = $baseRead['login'][$login]; // login = login
      }

      $error = array();
        /* if(!isset($baseRead['base'][$currentBucket])
            || !is_array($baseRead['base'][$currentBucket])
            || !isset($baseRead['base'][$currentBucket]['User']['passowrd'])) {*/
            if($baseRead['base'][$currentBucket]['User']['login'] !== $login ){
             //   var_dump($baseRead['base'][$currentBucket]['User']);
         //   $error []= 'Пользователь не найден';  
         } 
         
       if($baseRead['base'][$currentBucket]['User']['password'] !== $password) {
        $error []= 'Не верный пароль';  
        } 

        
        if(empty($error)){
            $_SESSION = $baseRead['base'][$currentBucket];
            echo 'Вход разрешен';
            exit();
            header("Location: /cabinet");
        } else {  
          echo ('У вас такие ошибки при вводе формы:  ');
          foreach ($error as $erro) {
          echo  ($erro . '<br>');
          }
          echo('Заполните все поля!');
          exit();

        /*  echo 'У вас такие ошибки:' . '<br>' .array_shift($error).'<br>';
           echo 'Заполните все поля!';*/
        }



        /* $_SESSION = $baseRead['base'][$currentBucket];
       
         echo'<pre>';
         var_dump($_SESSION);
         echo '</pre>';
        return $baseRead['base'][$currentBucket];
        header("Location: /cabinet");*/
    }// <- Конец функции
    
}
?>