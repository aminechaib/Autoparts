<?php
require_once('./admin/includes/initialize.php');
if(!empty($_POST["id"])){
    $objectModels = Moteur::find_Motors_by_model_id($_POST["id"]);
    var_dump($objectModels);
    if($objectModels)
    {
        echo '<option value="">Select moteur</option>';		
    	foreach($objectModels as $motor){
    		echo '<option value="'.$motor->id.'">'.$motor->name.'</option>';
    	}
    }
    else{
        echo '<option value="">not available</option>';
    }
}
?>