<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$client = Client::find_by_id($id);

if($client == false){
redirect_to('index.php');
};
if(is_post_request() && isset($_POST['modifier'])){
      
    /*
    foreach ($_POST as $key => $value) {            
      $_POST[$key] = test_input($value);
      }
    */

   
   $args = [];
   $args['id'] = $_GET['id']?? NULL;

   $args['first_name'] = $_POST['first_name'] ?? NULL;
   $args['last_name'] = $_POST['last_name'] ?? NULL;
   $args['mobile_phone'] = $_POST['mobile_phone'] ?? NULL;
   $args['email'] = $_POST['email'] ?? NULL;
   $args['hashed_password'] = $_POST['hashed_password'] ?? NULL;
   $args['adresse'] = $_POST['adresse'] ?? NULL;
  
   $args['id_ad'] = 1;
   

   $client->merge_attributes($args);
  $result =$client->update();
  if($result){
    //echo 'jazat la requete';
    session_start();
    $_SESSION['toast'] = true;
    $_SESSION['toastType'] = "une modification";
    redirect_to('index.php');
  }else{
     //echo 'mamchatch';
  }
}
?>