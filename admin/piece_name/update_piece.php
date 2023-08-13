<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$piece = piece_name::find_by_id($id);

if($piece == false)
{
redirect_to('index.php');
};
if(is_post_request() && isset($_POST['modifier'])){
      
    /*
    foreach ($_POST as $key => $value) {            
      $_POST[$key] = test_input($value);
      }
    */

   
  
   
   $args = []; ;
   $args['id'] = $_GET['id']?? NULL;
   $args['name'] = $_POST['name'] ?? NULL;
   $args['id_admin'] = 1;
   $args['id_categorie'] =  $_POST['id_categorie'] ?? NULL;;
   $args['photo'] = "mm.jpg";
   $args['creation_date'] = date('Y-m-d H:m:s');
   $piece->merge_attributes($args);
  $result =$piece->update();
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