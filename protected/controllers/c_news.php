<?php

class C_News extends Controller
{
    
    public $template = 'main/';
    
	function action_index()
	{	
		$this->view->generate('news/index.tpl');
	}
    
    
}