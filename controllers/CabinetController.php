<?php

class  CabinetController extends Controller{
    private $pageTpl = "/views/cabinet.tpl.php";

    public function __construct(){
        $this->model = new CabinetModel();
        $this->view = new View ();
    }

    public function index() {
		if(!$_SESSION['User']) {
			header("Location: /");
      echo ("Вход выполнен");
    }
    $this->view->render($this->pageTpl, $this->pageData);
		}

    public function logout() {
      session_destroy();
      header ("Location: /");
  }
        

    }











?>