<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$compatible = Compatible::find_by_id($id);

if($compatible == false)
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
   $args['id_moteur'] = $_POST['id_moteur'] ?? NULL;
   $compatible->merge_attributes($args);
  $result =$compatible->update();
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