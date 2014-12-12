<?php 


class Main extends Model
{
    public function Index() {
        
        if($_SESSION['session_id'] != null) {
                       
            $this->connect();
            $session_id = $_SESSION['session_id'];
            $this->select('users','*',null,"session_id = '$session_id'");
            $data = $this->getResult();
                   
            return $data['0']['email'];
        }
        
        
    }
}
