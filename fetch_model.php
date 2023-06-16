<?php
require_once('./admin/includes/initialize.php');
if(!empty($_POST["id"])){
    $objectModels = Model::find_Models_by_mark_id($_POST["id"]);
    // var_dump($objectModels);
    if($objectModels)
    {
        echo '<option value="">Select Model</option>';
    	foreach($objectModels as $model){
        // var_dump($model);exit; 
    		echo '<option value="'.$model->id.'">'.$model->name.'</option>';
    	}
    }
    else{
        echo '<option value="">not available</option>';
    }
}
?>