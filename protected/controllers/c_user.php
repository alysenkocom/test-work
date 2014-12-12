<?php

class C_User extends Controller
{
    
    public $template = 'main/';
    
    function __construct()
	{
		$this->model = new User();
		$this->view = new View();
	}
    
	function action_index()
	{	
		$this->view->generate('user/index.tpl');
	}
    
    function action_password()
	{  
        $data = $this->model->UserPassword();
		$this->view->generate('user/password.tpl', null, $data);
	}
    
    function action_profile()
	{	
        $data = $this->model->UserProfile();
		$this->view->generate('user/profile.tpl', null, $data);
	}
    
    function action_edit()
	{	
        $data = $this->model->UserEditProfile();
		$this->view->generate('user/edit.tpl', null, $data);
	}
    
    function action_registration() {
        $data = $this->model->UserRegistration();
        $this->view->generate('user/registration.tpl', null, $data);
    }
    
    function action_exit() {
        $data = $this->model->UserExit();
        $this->view->generate('user/exit.tpl');
    }
    
    function action_aut() {
        $data = $this->model->UserAut();
        $this->view->generate('user/aut.tpl', null, $data);
    }
    
    function action_users() {
        $data = $this->model->AllUsers();
        $this->view->generate('user/users.tpl', null, $data);
    }
    
    
}