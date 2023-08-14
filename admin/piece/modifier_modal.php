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
$piece = Piece::find_by_id($id);
// var_dump($piece);
$categorys = Category::find_all();
$marks = Mark::find_all_piece();
$piece_name=piece_name::find_all_names();


//var_dump(($marks));exit;
?>

        <div class="ui fluid container">
            <div class="ui padded grid">
            <h1>Modifier Piece N° <?php echo $id ?></h1>
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
                                <label for="">nom_de_piece:</label>
                                
                                <select class="ui search dropdown" name="id_name">
                                <option value="">nom_de_piece..</option>
                               <?php
            
                               foreach ($piece_name as $piece_n) {
                                

                                 ?>
                                   
                                <option value="<?php echo $piece_n->id;?>" <?php if($piece->id_name == $piece_n->id) echo 'selected'; ?>><?php echo $piece_n->name; ?></option>
                                <?php
                         //var_dump($piece_n);echo "hhhhhhhhhhh"; 
                              }?>
                                </select>

                                <div class="field">
                                <label>Reference</label>
                                <input type="text" value="<?php if(isset($_POST['reference'])) echo $_POST['reference']; ?>" name="reference" placeholder="reference">
                            </div>
                            <div class="field">
                                <label>quantity</label>
                                <input type="text" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity']; ?>" name="quantity" placeholder="quantity">
                            </div>
                            <div class="field">
                                <label>prix d'achat</label>
                                <input type="text" value="<?php if(isset($_POST['purchase_price'])) echo $_POST['purchase_price']; ?>" name="purchase_price" placeholder="purchase_price">
                            </div>
                            <div class="field">
                                <label>prix d'vent</label>
                                <input type="text" value="<?php if(isset($_POST['sale_price'])) echo $_POST['sale_price']; ?>" name="sale_price" placeholder="sale_price">
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

                id_name: {
                    identifier: 'id_name',
                    rules: [{
                            type: 'empty',
                            prompt: 'choisie le nom de piece'
                        },

                    ]
                },
                id_mark: {
                    identifier: 'id_mark',
                    rules: [{
                            type: 'empty',
                            prompt: 'choisie une marque de piece'
                        },

                    ]
                }, reference: {
                    identifier: 'reference',
                    rules: [{
                            type: 'empty',
                            prompt: 'reference ne doit pas etre vide'
                        },

                    ]
                }, quantity: {
                    identifier: 'quantity',
                    rules: [{
                            type: 'empty',
                            prompt: 'quantity ne doit pas etre vide'
                        },

                    ]
                },
                purchase_price: {
                    identifier: 'purchase_price',
                    rules: [{
                            type: 'empty',
                            prompt: "prix d'achat ne doit pas etre vide"
                        },

                    ]
                },
                sale_price: {
                    identifier: 'sale_price',
                    rules: [{
                            type: 'empty',
                            prompt: "prix d'vent ne doit pas etre vide"
                        },

                    ]
                }
              
              

            }
        });

    
$('#modifier_form<?php echo $id ?>')

  .form('set values', {
  
    reference     : '<?php echo h($piece->reference); ?>',
    quantity     : '<?php echo h($piece->quantity); ?>',
    purchase_price     : '<?php echo h($piece->purchase_price); ?>',
    sale_price     : '<?php echo h($piece->sale_price); ?>', 
    photo    : '<?php echo h($piece->photo); ?>', 
    terms      : true
  })
;
    </script>