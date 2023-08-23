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
                            <i class="file image outline icon"></i>
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
                                <input type="text" name="name" placeholder="Nom de model">
                            </div>
        
       

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
                },
                  id_categorie: {
                    identifier: 'id_categorie',
                    rules: [{
                            type: 'empty',
                            prompt: 'choisie la categorie'
                        }
                    ]
                }
              
            }
        });


        $('#modifier_form<?php echo $id ?>')

.form('set values', {
  name     : '<?php echo h($piece->name); ?>',

  terms      : true
})
;
    </script>
