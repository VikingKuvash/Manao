<?php
     
class regController extends Controller {
      
    private $pageTpl = "/views/reg.tpl.php";

    public function __construct () {
        $this->model = new regModel();
        $this->view = new View ();
    }

    public function index (){
        $this->pageData['title'] = "Регистрация";
        $data  =  json_decode(file_get_contents('php://input'));
        $_POST = (array) $data;
        //var_dump($data);
        //var_dump($_POST);
         if(!empty($_POST)){
            if(!$this->registrat()){

             }
       }
       $this->view->render($this->pageTpl, $this->pageData);
    }

    public function registrat() {
        if(!empty($_POST) || !isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['password2']) || !isset($_POST['email']) || 
        !isset($_POST['name'])){
    // if(isset($_POST)){
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $password2 = md5($_POST['password2']);
        $email = $_POST['email'];
        $name = $_POST['name'];
        
        $error = array();
       
        if(trim($login) == ''){
             $error[] = 'Введите логин';
         }
         
         if(mb_strlen($_POST['login']) < 6){
            $error[] = 'Короткий логин, символов должно быть больше 6'; //валидность длины логина
         }

         if (!preg_match("/^\S*$/", $_POST['login'])) {
            $error [] = 'Ввод пробелов запрещен в логине';
         }   
         if(trim($password) == ''){
            $error[] = 'Введите пароль';
        }
        if(!preg_match("/^\S*$/", $_POST['password'])){
            $error [] = 'Ввод пробелов запрещен в пароле';
        }
        if($password != $password2){
            $error[] = 'Пароли не совпадают';
        }
        if (!preg_match("/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password'])) {
            $error[] = 'Требование к паролю: Минимально длина пароля 6 символов,в пароле должны присуствовать латинские буквы и цифры, а также должна быть заглавная буква,допускаются спец символы.';
        }

        if(empty($email)){
         $error[] = 'Поле Email не может быть пустым!';
        } else {
            if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $email))
         $error[] = 'Не правильно введен E-mail';
         }
         if(empty($name)){
            $error[] = 'Поле Name не может быть пустым!';
        }

        if (!preg_match("/^\S*$/", $name)) {
            $error [] = 'Ввод пробелов запрещен в имени';
         }  
        if(empty($error)){
           // $this->pageData['registerMsg'] = "Вы зарегистрированы."; 
           echo ('Вы зарегистрированные.');
            $this->model->regNewUser($login,$password,$email,$name); 
            exit();
   /*         echo 'Вы зарегистрированные';
            $form = ($_POST);
                switch ($form) {
                    case true:
                        echo  json_encode('Вы зарегистрированные');
                        break;
                }
            
                $result = array(
                    'login' => $_POST['login'],
                    'password' => $_POST['password'],
                    'password2' => $_POST['password2'],
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                );
                $message = 'Вы зарегистрированные'.$result;
                var_dump($result);
                $response = array();
                $response ['success'] = true;
                $response ['message']  = $message;
                echo json_encode($response);
               
               if(isset($_POST)){
                  
                    $_POST['login'];
                    $_POST['password'];
                   $_POST['password2'];
                   $_POST['email'];
                     $_POST['name'];
                   //  echo 'ggod';
                   //  var_dump($_POST);
                    
                }else {
                   // echo 'Error';
                }
                $data  =  json_decode(file_get_contents('php://input'));
                $reg = file_get_contents("php://input");
                $obk = json_encode($reg);*/
        } else {
        echo ('У вас такие ошибки при вводе формы: ');
        foreach ($error as $erro) {
        echo  ($erro . '<br>');
        }
        echo('Заполните все поля!');
        exit();
      //   echo 'У вас такие ошибки:' . '<br>' .array_shift($error).'<br>';
        // $this->pageData['registerMsg'] = "Вы заполнили не все поля";  
        }

   }
   
    } // <---- конец функции
}






















?>