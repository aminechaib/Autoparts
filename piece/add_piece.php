
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
      $args['name'] = $_POST['name'] ?? NULL;
      $args['id_mark'] = $_POST['id_mark'] ?? NULL;
      $args['id_admin'] = 1;
      $args['id'] ?? '';
      $args['reference'] = $_POST['reference'] ?? NULL;
      $args['id_categorie'] = $_POST['id_categorie'] ?? NULL;
      $args['purchase_price'] = $_POST['purchase_price'] ?? NULL;
      $args['sale_price'] = $_POST['sale_price'] ?? NULL;
      $args['quantity'] = $_POST['quantity'] ?? NULL;
      $args['photo'] = $_POST['photo'] ?? NULL;


     //var_dump($args) . "<br>";exit;
      
      $piece = new piece($args);
      //var_dump($piece);
      ///////////////////////////////////////////////
      $result = $piece->check_validation();
      
      if($result === true){

        $_SESSION['toast'] = true;
        $_SESSION['toastType'] = "un ajout d'une piece ";
        redirect_to('index.php');

      }else{
        session_start();
        $_SESSION['errors'] = $result;//ykhabi les erreurs ta3 validate()
        redirect_to('add_piece.php');//bah yweli hna
      }
}
///////////////////////////////////////////////////////////////////////////////////
include("../includes/app_head.php");
?>


    <div class="page">

        <div class="ui fluid container">

            <?php include('../includes/menu_head.php'); 
            $marks = Mark::find_all();
            $categorys = Category::find_all();
            ?>

            <div class="ui padded grid">

                <div class="ui fifteen wide column row centered grid segment">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;Ajouter une piece</h2>
                    <form method="POST" class="ui form">
                        <div class="three fields">
                            <div class="field">
                                <label for="">Mark:</label>
                                
                                <select class="ui search dropdown" name="id_mark">
                                <option value="">Mark..</option>
                               <?php foreach ($marks as $mark) {
                                   ?>
                                <option value="<?php echo $mark->id; ?>">  <?php echo $mark->name; ?></option>

                                <?php
                               }?>
                                </select>
                                <label for="">category:</label>
                                
                                <select class="ui search dropdown" name="id_categorie">
                                <option value="">category..</option>
                               <?php foreach ($categorys as $category) {
                                   ?>
                                <option value="<?php echo $category->id; ?>">  <?php echo $category->name; ?></option>

                                <?php
                               }?>
                                </select>

                            </div>
                            <div class="field">
                                <label>Nom</label>
                                <input type="text" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" name="name" placeholder="Nom de piece">
                            </div>
                            <div class="field">
                                <label>Reference</label>
                                <input type="text" value="<?php if(isset($_POST['reference'])) echo $_POST['reference']; ?>" name="reference" placeholder="reference">
                            </div>
                            <div class="field">
                                <label>quantity</label>
                                <input type="text" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity']; ?>" name="quantity" placeholder="quantity">
                            </div>
                            <div class="field">
                                <label>purchase_price</label>
                                <input type="text" value="<?php if(isset($_POST['purchase_price'])) echo $_POST['purchase_price']; ?>" name="purchase_price" placeholder="purchase_price">
                            </div>
                            <div class="field">
                                <label>sale_price</label>
                                <input type="text" value="<?php if(isset($_POST['sale_price'])) echo $_POST['sale_price']; ?>" name="sale_price" placeholder="sale_price">
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
