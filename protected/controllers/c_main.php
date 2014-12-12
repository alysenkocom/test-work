<?php

class C_Main extends Controller
{
    
    // бермем шаблон.
    //public $template = 'main/template.php'; // шаблон модуля
    public $template = 'main/';
    
    function __construct()
	{
		$this->model = new Main();
		$this->view = new View();
	}
    
    
    
    
    
	function action_index()
	{	
	    $data = $this->model->Index();
		$this->view->generateID('main/view.tpl',null,$data);
		// $this->view->generate('main/view.tpl', $template);
	}
    
    function action_error()
    {
        $this->view->generate('main/error.tpl');
    }
    
}