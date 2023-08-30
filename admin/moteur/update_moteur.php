<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$moteur = Moteur::find_by_id($id);

if($moteur == false){
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
   $args['name'] = $_POST['name'] ?? NULL;
   $args['id_ad'] = 1;
   $args['enrgie']= $_POST['enrgie'] ?? NULL;
   $args['puissance'] = $_POST['puissance'] ?? NULL;
   $args['creation_date'] = date('Y-m-d H:m:s');
   

   $moteur->merge_attributes($args);
  $result =$moteur->update();
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