<?php
require_once('./admin/includes/initialize.php');
if(!empty($_POST["id"])){
    $objectModels = Compatible::test($_POST['id']);
   
    if($objectModels)
    {
      
         echo '<option value="">Select moteur</option>';		
    	foreach($objectModels as $piece){
        // var_dump($piece);
    		 echo '<option value="'.$piece->name.'">'.$piece->photo.$piece->name.$piece->reference;'</option>';
    	}
    }
    else{
        echo '<option value="">not available</option>';
    }
}
?>
