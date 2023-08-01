<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$voiture = Voiture::find_by_id($id);

if($voiture == false)
{
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
   $args['id_ad'] = 1;
   $args['id_model'] = $_POST['id_model'] ?? NULL;
   $args['id_moteur'] = $_POST['id_moteur'] ?? NULL;
   $voiture->merge_attributes($args);
  $result =$voiture->update();
  if($result){
  //  echo 'jazat la requete';
    session_start();
    $_SESSION['toast'] = true;
    $_SESSION['toastType'] = "une modification";
    redirect_to('index.php');
  }else{
     //echo 'mamchatch';
  }
}
?>