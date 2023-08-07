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
      $args['id_name'] = $_POST['id_name'] ?? NULL;
      $args['id_mark'] = $_POST['id_mark'] ?? NULL;
      $args['id_admin'] = 1;
      $args['id'] ?? '';
      $args['reference'] = $_POST['reference'] ?? NULL;
      $args['purchase_price'] = $_POST['purchase_price'] ?? NULL;
      $args['sale_price'] = $_POST['sale_price'] ?? NULL;
      $args['quantity'] = $_POST['quantity'] ?? NULL;

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
            $marks = Mark::find_all_piece();
       $names = piece_name::find_all_names();
    //    var_dump($names);exit;
            ?>

            <div class="ui padded grid">

                <div class="ui fifteen wide column row centered grid segment">
                    <h2 class="ui left aligned header"><i class=" icons">
                    <i class="users icon"></i>
                    <i class="corner add icon"></i>
                    </i>&nbsp;Ajouter une piece</h2>
                    <div class="field">
                     <label>photo</label>     
  <input type="file" id="fileInput"/>
  <button onclick="uploadImage()">Upload</button>
  <img id="image" />
  </div>
  <script>
  function uploadImage() {
      
      var file = document.getElementById("fileInput").files[0];
      var reader = new FileReader();
      reader.onload = function () {
        var imageData = reader.result;
        var image = new Image();
        image.src = imageData;
        image.onload = function () {
          var width = image.width;
          var height = image.height;
          var resizedImage = resizeImage(image, 1200, 1000);
          document.getElementById("image").src = resizedImage;
          saveImageToServer(resizedImage); // Call the function to save the image on the server
        };
      };
      reader.readAsDataURL(file);
    }

    function resizeImage(image, width, height) {
  var canvas = document.createElement("canvas");
  canvas.width = width;
  canvas.height = height;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(image, 0, 0, width, height);

  // Specify the image format explicitly (JPEG)
  return canvas.toDataURL('image/jpeg', 0.8); // You can adjust the quality (0.0 to 1.0)
}

function saveImageToServer(imageData) {
    var fileExtension = imageData.split(';')[0].split('/')[1];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText); // Optional: Display the server response
      }
    };
    xhttp.open("POST", "save_image.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("imageData=" + encodeURIComponent(imageData) + "&extension=" + fileExtension);
  

}

  </script>
                    <form method="POST" class="ui form" enctype="multipart/form-data">
                        <div class="three fields">
                            <div class="field">
                                <label for="">Mark:</label>                                
                                <select class="ui search dropdown" name="id_mark">
                                    <option value="">Mark..</option>
                                    <?php foreach ($marks as $mark) { ?>
                                    <option value="<?php echo $mark->id; ?>">  <?php echo $mark->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="field">
                                <label for="">name:</label>
                                <select class="ui search dropdown" name="id_name">
                                    <option value="">name..</option>
                                    <?php foreach ($names as $name) {
                                    ?>
                                    <option value="<?php echo $name->id; ?>">  <?php echo $name->name;?></option>

                                    <?php
                                    }?>
                                </select>
                            </div>
              
                              
                        </div>
                        <div class="four fields">
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
                        <div class="one fields">
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
