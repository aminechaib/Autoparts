<?php
require_once('./admin/includes/initialize.php');
if(!empty($_POST["id"])){
    $objectModels = Compatible::find_piece_by_moteur_id($_POST["id"]);
   
    if($objectModels)
    {
         echo '<option value="">Select moteur</option>';		
    	foreach($objectModels as $piece){
          var_dump($piece);
    		 echo '<option value="'.$piece->name.'">'.$piece->name.'</option>';
    	}
    }
    else{
        echo '<option value="">not available</option>';
    }
}
?>
