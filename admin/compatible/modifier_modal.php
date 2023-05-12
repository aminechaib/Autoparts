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
$compatible = Compatible::find_by_id($id);
$models = Model::find_all();
$moteurs = Moteur::find_all();
//var_dump(($marks));exit;
?>

        <div class="ui fluid container">


            <div class="ui padded grid">
            <h1>Modifier Compatible N° <?php echo $id ?></h1>

                <div class="ui fifteen wide column row centered grid" id="modifier_grid<?php echo $id ?>">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;modifier la compatible</h2>
                    <form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="update_compatible.php?id=<?php echo $id ?>">
                        <div class="two fields">
                                <div class="field">
                                <label for="">Model:</label>
                                
                                <select class="ui search dropdown" name="id_model">
                                <option value="">Model..</option>
                               <?php foreach ($models as $model) {
                                   ?>
                                <option value="<?php echo $model->id;?>" <?php if($compatible->id_model == $model->id) echo 'selected'; ?>>  <?php echo $model->name; ?></option>

                                <?php
                               }?>
                                </select>
                                <label for="">Moteur:</label>
                                <select class="ui search dropdown" name="id_moteur">
                                <option value="">Moteur..</option>
                               <?php foreach ($moteurs as $moteur) {
                                   ?>
                                <option value="<?php echo $moteur->id;?>" <?php if($compatible->id_moteur == $moteur->id) echo 'selected'; ?>>  <?php echo $moteur->name; ?></option>
                                <?php
                               }?>
                                </select>


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
                }
              

            }
        });


$('#modifier_form<?php echo $id ?>')

  .form('set values', {
    name     : '<?php echo h($compatible->name); ?>',
    reference     : '<?php echo h($compatible->reference); ?>',
    quantity     : '<?php echo h($compatible->quantity); ?>',
    purchase_price     : '<?php echo h($compatible->purchase_price); ?>',
    sale_price     : '<?php echo h($compatible->sale_price); ?>', 
    terms      : true
  })
;
    </script>