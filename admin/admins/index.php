<?php 
require_once("../includes/initialize.php");
if(require_login() && ! $session->check_one()){
    redirect_to(url_for('dashboa.php'));
    }else{
        
    }
include("../includes/app_head.php");

?>
<?php $bool = $_SESSION['toast'] ?? false; ?>
<?php $bool_admin = $_SESSION['toast_admin'] ?? false; ?>
 <style>

.ui.button i {
    display: inline;
}
.limits{
   /* height: 60%; */
}
.ui.fifteen.wide.column.row.centered.grid.segment{
    height: 85vh;
    overflow: scroll;
}
.open_ad{
        border-right:3px solid #119ee7;
        
        }
 </style>

 <div class="page">

     <div class="ui fluid container">

         <?php include('../includes/menu_head.php'); ?>  

         <div class="ui padded grid">

             <div class="ui fifteen wide column row centered grid segment">

                 <div class="ui pointing secondary big menu">


                     <h1 class="ui header item"><i class="lock open icon"></i>Admin</h1>


                     <!-- <a class="item active" data-tab="first"><i class="large list icon"></i></a> -->
                   

                     <div class="right item">
                         <a href="add_admin.php" class="">
                             <i class="big plus circle icon"></i>

                         </a>
                         <div class="ui search  " id="load_search">
                                        <div class="ui icon input">
                                            <input class="prompt" type="text" placeholder="Rechercher..."
                                                id="search">
                                            <i class="search icon"></i>
                                        </div>
                                        <div class="results"></div>
                                    </div>
                     </div>
                 </div>
                 <div class="ui bottom attached tab  active limits" data-tab="first">               
                    <table class="ui striped large table" id="tabAll">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>username</th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php
                                $admins = Admin::find_all();
                                
                                if($admins){
                                    foreach($admins as $admin){
                                ?>
                                <tr>
                                    <td><?php echo h($admin->id);?></td>
                                    <td><?php echo h($admin->first_name.' '.$admin->last_name);?></td>
                                    <?php if($admin->role != 'super-admin'){ ?>
                                    <form action="delete.php?id=<?php echo h($admin->id);?>"  method='POST'>
                                        <td><button  class="ui tiny red button" name="supprimer"><i class="minus circle icon"></i><span>Supprimer</span></button></td>
                                    </form>
                                    <?php } ?>
                                </tr>
                                <?php
                                    }
                                }
                            ?>
                         </tbody>
                     </table>
                 </div>
             <!-- end row head-->
         </div>
     </div>
     <!--fin page-->

<script>

$(document).ready(() => {

<?php
if($bool){
    echo "
    $('body')
 .toast({
   class: 'success',
   message: `admin a été supprimé !`
 })
;
    ";
}    
if($bool_admin){
    echo "
    $('body')
 .toast({
   class: 'warning',
   message: `vous pouvez pas supprimer l'admin !`
 })
;
    ";
}    
$_SESSION['toast'] = false;
$_SESSION['toast_admin'] = false;
?>
         // Write on keyup event of keyword input element  
  // Write on keyup event of keyword input element
  $("#search").keyup(function() {
        var searchText = $(this).val().toLowerCase();
        // Show only matching TR, hide rest of them
        $.each($("#tabAll tbody tr, #tabPro tbody tr, #tabParti tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf(searchText) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });


$('.menu .item')
 .tab();


}) //fin ready
</script>


     <?php 
require_once("../includes/app_foot.php");
?>