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

$order = Order_piece::find_by_id($id);
foreach($order as $all){
    var_dump($all);
}
// var_dump($order);

$categorys = Category::find_all();
$marks = Mark::find_all_piece();
//var_dump(($marks));exit;
?>

        <div class="ui fluid container">
            <div class="ui padded grid">
            <h1>commande N° <?php echo $id ?></h1>
                <div class="ui fifteen wide column row centered grid" id="modifier_grid<?php echo $id ?>">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;modifier la piece</h2>
                    <form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="update_piece.php?id=<?php echo $id ?>">
                        <div class="two fields">
                                <div class="field">
                                <label for="">Mark:</label>
                                
                                <select class="ui search dropdown" name="id_mark">
                                <option value="">Mark..</option>
                               <?php foreach ($marks as $mark) {
                                   ?>
                                <option value="<?php echo $mark->id;?>" <?php if($piece->id_mark == $mark->id) echo 'selected'; ?>>  <?php echo $mark->name; ?></option>

                                <?php
                               }?>
                                </select>
                                <label for="">Category:</label>
                                
                                <select class="ui search dropdown" name="id_categorie">
                                <option value="">Category..</option>
                               <?php foreach ($categorys as $category) {
                                   ?>
                                <option value="<?php echo $category->id;?>" <?php if($piece->id_categorie == $category->id) echo 'selected'; ?>>  <?php echo $category->name; ?></option>

                                <?php
                               }?>
                                </select>

                                
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
                            <div class="field">
                                <label>photo</label>
                                <input type="file" value="<?php if(isset($_POST['photo'])) echo $_POST['photo']; ?>" name="photo" id="photo">
                            </div>


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
    name     : '<?php echo h($piece->name); ?>',
    reference     : '<?php echo h($piece->reference); ?>',
    quantity     : '<?php echo h($piece->quantity); ?>',
    purchase_price     : '<?php echo h($piece->purchase_price); ?>',
    sale_price     : '<?php echo h($piece->sale_price); ?>', 
    photo    : '<?php echo h($piece->photo); ?>', 
    terms      : true
  })
;
    </script>