<?php 

class Session{
    
    private $admin;
    public $username;

    private $client;
    public $username_client;

    public function __construct()
    {
        session_start();
        $this->check_stored_login();
    }
    
    public function login($object, $param){
        //var_dump($admin);exit;
        if($param == 'admin')
        {
            if($object){
                session_regenerate_id(); 
                $_SESSION['admin'] = $object;
                $_SESSION['username'] = $object->first_name . ' ' . $object->last_name;
                $this->admin = $object->id;
                return true;
            }
        }
        elseif($param == 'client'){
            if($object){
                session_regenerate_id(); 
                $_SESSION['client'] = $object;
                $_SESSION['username'] = $object->first_name . ' ' . $object->last_name;
                $this->admin = $object->id;
                return true;
            } 
        }
        
    }

    public function is_logged_in(){
        return isset($this->admin);
    }

    public function logout(){
        unset( $_SESSION['admin']);
        unset($this->admin);
        return true;
    }



    private function check_stored_login(){
        if(isset( $_SESSION['admin'])){
            $this->admin =  $_SESSION['admin'];
        }
    }
    public function check_one(){
       if(  $this->admin->id == 1){
           return true;
       }else{
           return false;
       }
    }
}

?>