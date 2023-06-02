
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
.open_pie{
        border-right:3px solid #119ee7;
        
        }
.error_email{
    background-color:#FFF6F6;
    color: #9F3A38;
    border:1px solid;
    border-radius:4px;
}
.error_email li{
    color: #9F3A38;
    margin:2px;
    text-align: left;
}
</style>

    <?php 
require_once("../includes/initialize.php");

/////////////////////////////////////////////////////////////////////////////

if(is_post_request() && isset($_POST['ajouter'])){

    //création et préparation de données pour les convertirs en objets 
      $args = [];
      $args['id_moteur'] = $_POST['id_moteur'] ?? NULL;
      $args['id_ad'] = 1;
      $args['id_model'] = $_POST['id_model'] ?? NULL;
      $args['id_piece'] = $_POST['id_piece'] ?? NULL;
      

     //var_dump($args) . "<br>";exit;
      
      $compatible = new compatible($args);
      //var_dump($compatible);
      ///////////////////////////////////////////////
      $result = $compatible->check_validation();
      
      if($result === true){

        $_SESSION['toast'] = true;
        $_SESSION['toastType'] = "un ajout d'une compatible ";
        redirect_to('index.php');

      }else{
        session_start();
        $_SESSION['errors'] = $result;//ykhabi les erreurs ta3 validate()
        redirect_to('add_compatible.php');//bah yweli hna
      }
}
///////////////////////////////////////////////////////////////////////////////////
include("../includes/app_head.php");
?>


    <div class="page">

        <div class="ui fluid container">

            <?php include('../includes/menu_head.php'); 
            $moteurs = Moteur::find_all();
            $pieces = Piece::find_all();
            ?>

            <div class="ui padded grid">

                <div class="ui fifteen wide column row centered grid segment">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;Ajouter une compatible</h2>
                    <form method="POST" class="ui form">
                        <div class="three fields">
                                <div class="field">
                                <label for="">Piece:</label>
                                
                                <select class="ui search dropdown" name="id_piece">
                                <option value="">Piece..</option>
                               <?php foreach ($pieces as $piece) {
                                   ?>
                                <option value="<?php echo $piece->id; ?>">  <?php echo $piece->reference."  ".$piece->name; ?></option>

                                <?php
                               }?>
                                </select>
                                <label for="">Moteur:</label>
                                
                                <select class="ui search dropdown" name="id_moteur">
                                <option value="">Moteur..</option>
                               <?php foreach ($moteurs as $moteur) {
                                   ?>
                                <option value="<?php echo $moteur->id; ?>">  <?php echo $moteur->name."  ".$moteur->puissance."ch"; ?></option>
                                <?php
                               }?>
                                </select>

                            </div>
                        </div>
                        <div class="one  fields">
                            <div class="field">
                                <input type="submit" class="ui button" value="ajouter" name="ajouter">
                            </div>
                        </div>

                        <!-- <div class="ui error message"><?php echo $php_errormsg ?? ''; ?></div> -->
                      
                    </form><!-- end form -->
                    <div class="<?php if(isset($_SESSION['errors']) and !empty($_SESSION['errors'])){ echo 'ui error message';} ?>">
                        <ul class="list">
                                        
                        <?php
                             if(isset($_SESSION['errors']) and !empty($_SESSION['errors'])){ 
                            foreach ($_SESSION['errors'] as $error) {
                            
                                echo '<li>'. $error . '</li>';
                            }
                            }
                        
                        ?>

                        </ul>

                    </div>

                </div><!-- end segment-->





            </div><!-- end grid-->


        </div><!-- end container-->



    </div>
    <!--fin page-->

<?php

$_SESSION['errors'] = [];

?>
    <script>
    $('.menu .item')
        .tab();

    $('.ui.radio.checkbox')
        .checkbox();

    $('#particulier').change(function() {
        $("#myfield").hide(500, function() {

        });
        document.getElementById("myCheck").disabled = true;

    });
    $('#professionnel').change(function() {
        $("#myfield").show(500, function() {

        });
        document.getElementById("myCheck").disabled = false;

    });


    
       
    </script>


    <?php 
require_once("../includes/app_foot.php");
?>
