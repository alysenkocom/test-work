<?php 


class User extends Model
{
    private $email;
    private $password;
    private $session_id;
    private $code_id; // по мылу
    
    public $username;
    public $usercity;
    
    public function UserRegistration() {
        $this->code_id = rand(1000000, 9999999);
        $this->session_id = rand(0, 9999999);
        
        
        if(isset($_GET['code_id'])) {
            
            
            $codeID = $_GET['code_id'];
            $this->connect();
            $this->select('users','*',null,"code_id = $codeID");
            $data = $this->getResult();
            if($data['0']['code_id'] == $codeID) {
                $_SESSION['session_id'] = $this->session_id;
                $this->update('users',array('session_id'=>$this->session_id),"code_id = $codeID");
                header('Location: /user/profile');
                exit;
            } else {
                header('Location: /user/registration');
                exit;
            }
            
                
        }
        
        
        

        if($_SESSION['session_id'] == null) {
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            
            
            # save
            
            
            if(isset($this->email) && isset($this->password)) {
                
                
                if($this->password == null)
                    echo $this->StatusError('вы не ввели пароль =(');
                elseif($this->email == null)
                    echo $this->StatusError('вы не ввели email =(');
                elseif(!preg_match('#^[A-z0-9-\._]+@[A-z0-9]{2,}\.[A-z]{2,4}$#ui',$this->email))
                    echo $this->StatusError('неверный формат email');
                else {
                                
                    $this->connect();
                    $this->select('users','*',null,"email = '$this->email'");
                    $data = $this->getResult();
                    if($data['0']['email'] == $this->email) {
                        echo $this->StatusError('пользователь с таким email уже зарегистрирован!');
                    } else {
                        
                            $this->connect();    
                            $this->insert('users', array(
                                'email' => $this->email,
                                'password' => $this->password,
                                'code_id' => $this->code_id,
                            ));
                            
                            $message = 'для подтверждения регистрации перейдите по ссылке http://'.$_SERVER['HTTP_HOST'].'/user/registration/?code_id='.$this->code_id;
                            $this->SystemEmail($this->email, 'подтверждение регистрации', $message);
                            
                            echo $this->StatusSuccess('подтвердите регистрацию по email');
                    }
                    
                    
                }
                
                
                
                
            }
        } else {
            // echo $this->StatusError('СТОП! Вы уже авторизованы! session_id = '.$_SESSION['session_id']);
            header('Location: /user/profile');
            exit;
        }
            
        
        
    }
    
    
    
    public function UserAut() {
                        
        
        if($_SESSION['session_id'] == null) {
            
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->session_id = rand(0, 9999999);
            
            if(isset($this->email) && isset($this->password)) {
                    
                $this->connect();
                $this->select('users', '*', null, "email = '$this->email' AND password = '$this->password'");
                if(!$data = $this->getResult()) {
                    echo $this->StatusError('неверные данные..');
                } else {
                    $_SESSION['session_id'] = $this->session_id;
                    $this->update('users',array('session_id'=>$this->session_id), "email = '$this->email'");
                    header('Location: /user/profile');
                    exit;
                }
                
            }
            
            
            
            
            
            
                                                            
        } else {
            // echo $this->StatusError('СТОП! Вы уже авторизованы! session_id = '.$_SESSION['session_id']);
            header('Location: /user/profile');
            exit;
        }
        
                                                
            
            
    }           
    
    
    
    public function UserProfile() {
        
        if($_SESSION['session_id'] == null) {
            header('Location: /user/registration');
            exit;
        } else {
            $this->connect();
            $sessionID = $_SESSION['session_id'];
            $this->select('users','*',null,"session_id = '$sessionID'");
            $data = $this->getResult();
            return $data;
        }
        
    }
    
    
    public function UserPassword() {
    
        $this->email = $_POST['email'];
        // + проверка на существование мыла
        if($_SESSION['session_id'] == null) {    
            if($this->email != null) {
                
                $this->connect();
                $this->select('users','*',null,"email = '$this->email'");        
                if($this->getResult()) {
                    
                    $newPassword = rand(0, 999999);
                    $this->update('users',array('password'=>$newPassword),"email = '$this->email'");
                    $messages = 'Ваш новый пароль: '.$newPassword;
                    $this->SystemEmail($this->email, 'Смена пароля', $messages);
                    
                    echo $this->StatusSuccess('Новый пароль выслан вам на email');
                    
                } else {
                    echo $this->StatusError('нету пользователя с таким email');
                }
                
            } else {
                echo $this->StatusError('введите свой регистрационный email');
            }
        } else {
            header('Location: /user/profile');
            exit;
        }
        
    }
    
    
    public function UserEditProfile() {
        $this->username = $_POST['name'];
        $this->usercity = $_POST['city'];
        
        if($_SESSION['session_id'] != null) {
            
            
            if($this->username != null && $this->usercity != null) {
                
                $this->connect();
                $sessionID = $_SESSION['session_id'];
                $this->update('users', array(
                    'name'  =>$this->username,
                    'city'  =>$this->usercity,
                    ), "session_id = '$sessionID'");
                echo $this->StatusSuccess('спасибо, сохранено..');
                
            } 
            
            
            
        } else {
            header('Location: /user/registration');
            exit;
        }
        
        
    }
    
    
    public function UserExit() {
        
        if($_SESSION['session_id']) {
            $_SESSION['session_id'] = null;    
        } else {
            header('Location: /user/registration');
            exit;
        }
        
    }
    
    
    
    public function AllUsers() {
        $this->connect();
        $this->select('users');
        return $this->getResult();
    }
    
    
    
}
