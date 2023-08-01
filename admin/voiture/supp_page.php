
<?php 
require_once('../includes/initialize.php');
require_login();

 $id = $_GET['id'] ?? NULL;
if(isset($id) && !empty($id)){

        $voiture = Voiture::delete($id);
        session_start();
$_SESSION['toast'] = true;
$_SESSION['toastType'] = "une suppression";

        redirect_to('index.php');
   
}else{
    echo 'faragh';
}

?>