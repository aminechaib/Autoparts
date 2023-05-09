
<?php

require_once("../includes/initialize.php");
if(require_login() && ! $session->check_one()){
  redirect_to(url_for('dashboard.php'));
  }
  
if(is_post_request() && isset($_POST['inscrire'])){   
    //création et préparation de données pour les convertirs en objets 
      $args = [];
      $args['first_name'] = $_POST['first_name'] ?? '';
      $args['last_name'] = $_POST['last_name'] ?? '';
      $args['email'] = $_POST['email'] ?? '';
      $args['mobile_phone'] = $_POST['mobile_phone'] ?? '';
      $args['role'] = $_POST['role'] ?? '';
      $args['password'] = $_POST['password'] ?? '';
      $args['confirm_password'] = $_POST['confirm_password'] ?? '';

      //var_dump($args) . "<br>";exit;
      $admin = new Admin($args);
      $result = $admin->save();

      if($result === true){
        redirect_to('index.php');
      }else{
        //session_start();
        $_SESSION['errors'] = $result;//ykhabi les erreurs ta3 validate()
        redirect_to('add_admin.php');//bah yweli hna
      }
}


///////////////////////////////////////////////////////////////////////////////////
?>
