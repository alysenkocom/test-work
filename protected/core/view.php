<?php

class View extends Smarty
{


    
    function generateID($content_view, $template_view = null, $data = null) {
        
        if($data) {
            $this->smarty->assign('postID', $data);
        }
        
        $this->smarty->display('protected/views/'.$template_view.'header.tpl');
        $this->smarty->display('protected/views/'.$content_view);
        $this->smarty->display('protected/views/'.$template_view.'footer.tpl');
        
    }
    
    
    
	function generate($content_view, $template_view = null, $data = null) {
		
        
        
        if($data) {
            foreach($data as $key => $value) {
                $this->smarty->assign('post', $data);     
            }
        }
        
        $this->smarty->display('protected/views/'.$template_view.'header.tpl');
        $this->smarty->display('protected/views/'.$content_view);
        $this->smarty->display('protected/views/'.$template_view.'footer.tpl');
        
        

	}
}
