<?php

class C_About extends Controller
{
    
    // бермем шаблон.
    //public $template = 'main/template.php'; // шаблон модуля
    public $template = 'template.php';
    
    function __construct()
	{        
		$this->model = new About();
		$this->view = new View();
		$this->smarty = new Smarty(); /** **/
	}
	
	
    function action_index()
	{  
	   $data = $this->model->get_data();
	   $this->view->generate('about/view.php', $this->template, $data);
	}
    
    
    
	function action_test()
	{
        $data = $this->model->get_data();
        $this->view->generate('about/test.tpl', $this->template, $data);
	}
    
    
        
}