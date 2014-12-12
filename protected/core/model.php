<?php

class Model extends DataBases
{
    
	public function StatusError($text) {
	   return '<div class="container">
      <div class="row"><div class="alert alert-danger">'.$text.'</div></div></div>';
	}
    
    public function StatusSuccess($text) {
	   return '<div class="container">
      <div class="row"><div class="alert alert-success">'.$text.'</div></div></div>';
	}
    
    public function SystemEmail($toemail, $subject, $message) {
        //$configSystem['system'] = require_once('config.php');
        mail($toemail, $subject, $message, 
         "From: admin@admin.com \r\n" 
        ."X-Mailer: PHP/" . phpversion()); 
    }


	public function get_data()
	{
		// todo
	}
}