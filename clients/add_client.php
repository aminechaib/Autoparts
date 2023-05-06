
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
.open_cl{
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
      $args['first_name'] = $_POST['first_name'] ?? NULL;
      $args['last_name'] = $_POST['last_name'] ?? NULL;
      $args['mobile_phone'] = $_POST['mobile_phone'] ?? NULL;
      $args['email'] = $_POST['email'] ?? NULL;  
      $args['adresse'] = $_POST['adresse'] ?? NULL;
      $args['id_ad'] = /*$_POST[''] ?? NULL*/ 1;

     // var_dump($args) . "<br>";
      
      $client = new Client($args);
      var_dump($client);
      ///////////////////////////////////////////////
      $result = $client->check_validation();
      
      if($result === true){

        $_SESSION['toast'] = true;
        $_SESSION['toastType'] = "un ajout d'un client ";
        redirect_to('index.php');

      }else{
        session_start();
        $_SESSION['errors'] = $result;//ykhabi les erreurs ta3 validate()
        redirect_to('add_client.php');//bah yweli hna
      }
      //////////////////////////////////////////////
    //   $result = $client->create();

    //   if($result == true){
        
    //     $_SESSION['toast'] = true;
    //     $_SESSION['toastType'] = "un ajout d'un client ";

    //     redirect_to('index.php');
    //   }else{
    //      // echo "error";
    //   }
    
///}hna taghla9 tcheck email
// else{
//     $_SESSION['valid_email'] = true;
//     $_SESSION['error_valid'] = 'email non valide';

// }
// } 
}
///////////////////////////////////////////////////////////////////////////////////
include("../includes/app_head.php");
?>

    <div class="page">

        <div class="ui fluid container">

            <?php include('../includes/menu_head.php'); ?>

            <div class="ui padded grid">

                <div class="ui fifteen wide column row centered grid segment">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;Ajouter un client</h2>
                    <form method="POST" class="ui form">
                        <div class="two fields">
                            <div class="field">
                                <label>Nom</label>
                                <input type="text" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" name="first_name" placeholder="Nom de client">
                            </div>
                            <div class="field">
                                <label>Prénom</label>
                                <input type="text" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" name="last_name" placeholder="Prenom de client">
                            </div>

                        </div>
                        <div class="three fields">
                            <div class="field">
                                <label style="">Numéro de téléphone</label>
                                <input type="text" value="<?php if(isset($_POST['mobile_phone'])) echo $_POST['mobile_phone']; ?>" name="mobile_phone" placeholder="213...">
                            </div>
                            <div class="field">
                                <label>E-mail</label>
                                <input type="Email" name="email" placeholder="exemple@gmail.com" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            </div>
                            <div class="field">
                                <label>Adresse</label>
                                <input type="text" name="adresse" placeholder=".....">
                            </div>

                        </div>
                        <div class="one  fields">
                            <div class="field" id="myfield" hidden>
                                <label>Nom de l'entreprise</label>
                                <input type="text"  name="entreprise" placeholder="Entreprise" id="myCheck" disabled>
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
