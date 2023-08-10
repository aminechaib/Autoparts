<?php

var_dump('here');
//import includes

$search = $_POST['search'];

if(!empty($search)){
    $sql = 'select * from piece where name like %'.$search.'%';
    // set function on piece class to do the job
    // piece::search($search);

    // echo '<option value="">Select Model</option>';
    // 	foreach($objectModels as $model){
    //     // var_dump($model);exit; 
    // 		echo '<option value="'.$model->id.'">'.$model->name.'</option>';
    // 	}
}
?>