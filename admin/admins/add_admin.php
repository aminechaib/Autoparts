<?php 
require_once('../includes/initialize.php'); 

if(require_login() && !$session->check_one()){
    redirect_to(url_for('dashboard.php'));
    }
?>
<style>
#search {
    background: inherit !important;
    margin-bottom: 10px;
    border: 0;
}

.prompt {
    border-radius: 5px !important;
}

label {
    float: left;
}
.open_ad{
        border-right:3px solid #119ee7;
        }
</style>

    <?php 
require_once("../includes/initialize.php");
include("../includes/app_head.php");


?>


    <div class="page">

        <div class="ui fluid container">
<?php include('../includes/menu_head.php');?>
            

            <div class="ui padded centered  grid">
           

                <div class="ui fifteen wide column row centered grid segment " id="modifier_grid">
                    <div class="ui pointing secondary big menu">
                        <h1 class="ui header item"><i class="user icon"></i>Ajouter admin</h1>
                    </div>
                    <?php if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])){ ?>
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <div class="header">
                        </div>
                        <ul class="list">
                               <?php
                                    foreach ($_SESSION['errors'] as $error) {
                                        echo '<li>' . $error .'</li>';
                                    }
                               ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <form method="POST" class="ui form grid" action="add.php">
                        <div class="ten wide column">
                            <div class=" field">
                                <label>nom</label>
                                <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="first_name" placeholder="nom" value="">
                            </div>
                        </div>
                        <div class="ten wide column">
                            <div class=" field">
                                <label>prenom</label>
                                <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="last_name" placeholder="prenom">
                            </div>
                        </div>
                        <div class="ten wide column">
                            <div class=" field">
                                <label>email</label>
                                <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="email" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="ten wide column">
                            <div class=" field">
                                <label>numéro téléphone</label>
                                <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="mobile_phone" placeholder="numéro téléphone">
                            </div>
                        </div>
                        <div class="ten wide column">
                            <div class=" field">
                                <label>role</label>
                                <select class="ui fluid dropdown" name="role">
                                    <option value="super-admin">super-admin</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>
                        <div class=" field"> 
                            <label>Mot de pass</label>
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="">
                            </div>
                        </div>
                        <div class=" field">
                            <label>confirmé mot de pass</label>
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="confirm_password" placeholder="">
                            </div>
                        </div>
                        <div class="  field">
                            <input type="submit" class="ui teal button" value="ajouter" name="inscrire">
                        </div>
                    </form><!-- end form -->
                    
                    
                <!-- end segment -->
            </div><!-- end grid-->
        </div><!-- end container-->
    </div>
    <!--fin page-->
<script>   
    
<?php    
//session_destroy();
$_SESSION['errors'] = [];
echo url_for('../dist/semantic.min.js'); 
?>
$(function() {
      
});

$('.menu .item')
        .tab();

// $("#leftbar-toggle").click(function() {
//     event.preventDefault();
//   $("body").toggleClass("opened");
//  });
</script>
<?php require_once("../includes/app_foot.php"); ?>
