<?php 
require_once('../includes/initialize.php');
require_login();

$id = $_GET['id'];
$category = Category::find_by_id($id);

if($category == false){
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
   

   $category->merge_attributes($args);
  $result =$category->update();
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