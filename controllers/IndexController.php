<?php
class IndexController extends Controller {
   private $pageTpl = "/views/auth.tpl.php";


    public function __construct () {
      $this->model = new IndexModel();
        $this->view = new View ();
    }
  
    public function index(){
        $this->pageData['title'] = 'Авторизация';
        $form = json_decode(file_get_contents('php://input'));
        $_POST = (array) $form;
        if(!empty($_POST)){
             if(!$this->login()){
             }
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }

   public  function login() {
       if(!$this->model->checkUser()) {
			return false;
        }

    }

  
   
}

 
