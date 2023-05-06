<?php 

class Session{
    
    private $admin;
    public $username;

    public function __construct()
    {
        session_start();
        $this->check_stored_login();
    }
    public function login($admin){
        //var_dump($admin);exit;
        if($admin){
            session_regenerate_id(); 
            $_SESSION['admin'] = $admin;
            $_SESSION['username'] = $admin->first_name . ' ' . $admin->last_name;
            $this->admin = $admin->id;
            return true;
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