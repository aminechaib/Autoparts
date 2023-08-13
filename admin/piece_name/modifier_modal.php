<?php
require_once('../includes/initialize.php');
require_login();
?>
<style>


.prompt {
    border-radius: 5px !important;
}

label {
    float: left;
}
</style>


<?php
$piece = piece_name::find_by_id($id);
$categorys = Category::find_all();
//var_dump(($marks));exit;
?>

        <div class="ui fluid container">
            <div class="ui padded grid">
            <h1>Modifier Nom_Piece N° <?php echo $id ?></h1>
                <div class="ui fifteen wide column row centered grid" id="modifier_grid<?php echo $id ?>">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;modifier Nom_piece</h2>
                    <form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="update_piece.php?id=<?php echo $id ?>">
                    <div class="one field">
                    <div class="field">
                                <label for="">Category:</label>
                                <select class="ui search dropdown" name="id_categorie">
                                <option value="">Category..</option>
                               <?php foreach ($categorys as $category) {
                                   ?>
                                <option value="<?php echo $category->id;?>" <?php if($piece->id_categorie == $category->id) echo 'selected'; ?>>  <?php echo $category->name; ?></option>
                                <?php
                               }?>
                                </select>
                                </div>
                            <div class="field">
                                <label>Nom</label>
                                <input type="text" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" name="name" placeholder="Nom de piece">
                            </div>
                            <div class="field">
                            <label>photo</label>     
                            <input type="file" id="imageInputt">
                            <button id="uploadButtonn">Upload and Resize</button>
                            <img id="image"  />
                            </div>
                            <script>
        document.getElementById('uploadButtonn').addEventListener('click', function() {
            const input = document.getElementById('imageInputt');
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();
                    img.src = e.target.result;

                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = 200;
                        canvas.height = 200;
                        ctx.drawImage(img, 0, 0, 200, 200);

                        const resizedDataURL = canvas.toDataURL('image/jpeg', 0.8);

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'upload_update.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                console.log(xhr.responseText);
                                location.reload(); // Reload the page to show the session variable
                            }
                        };
                        xhr.send('image=' + encodeURIComponent(resizedDataURL));
                    };
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
       

                        </div>
                        <div class="one  fields">
                            <div class="field">
                            
                                <input type="submit" class="ui yellow button" value="Modifier" name="modifier">
                            </div>
                        </div>

                        <div class="ui error message"></div>
                    </form><!-- end form -->

                </div><!-- end segment-->





            </div><!-- end grid-->


        </div><!-- end container-->




    <div id="modifier_success<?php echo $id ?>" hidden>


<div class="ui centered grid">
    <div class="ten wide column row">
        <div class="row">
            <div class="ui big success message">
                <div class="sixteen wide column">
                <i class="check big icon"></i><h2> modification réussite</h2> 
                </div>
                <br>
                        
                <div class="sixteen wide column">
                <button class="ui green button" id="modif_refresh_button<?php echo $id ?>"><i class="sync alternate icon"></i>Actualiser</button>
                </div>
       

            </div>
        </div>
        
    </div>

    <div class="row"></div>

</div>
</div>

<script>

$(function() {
      
});



    $('.menu .item')
        .tab();

    $('.ui.radio.checkbox')
        .checkbox();


     $('#particulier<?php echo $id ?>').change(function() {
         
        if(this.checked){
        console.log('hna part');
        
            $('#myfield<?php echo $id ?>').addClass('disabled');
        }

     });
     $('#professionnel<?php echo $id ?>').change(function() {

        if(this.checked){
        console.log('hna pro');

            $('#myfield<?php echo $id ?>').removeClass('disabled');
            
        }

     });
         

    $('#modifier_form<?php echo $id ?>')
        .form({
            on: 'blur',
            fields: {

                name: {
                    identifier: 'name',
                    rules: [{
                            type: 'empty',
                            prompt: 'manque un nom'
                        },

                    ]
                }
              

            }
        });


$('#modifier_form<?php echo $id ?>')

  .form('set values', {
    name     : '<?php echo ($piece->name); ?>',
    reference     : '<?php echo h($piece->reference); ?>',
    quantity     : '<?php echo h($piece->quantity); ?>',
    purchase_price     : '<?php echo h($piece->purchase_price); ?>',
    sale_price     : '<?php echo h($piece->sale_price); ?>', 
    photo    : '<?php echo h($piece->photo); ?>', 
    terms      : true
  })
;
    </script>