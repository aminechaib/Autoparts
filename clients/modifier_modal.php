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
$client = Client::find_by_id($id);
?>

        <div class="ui fluid container">


            <div class="ui padded grid">
            <h1>Modifier client N° <?php echo $id ?></h1>

                <div class="ui fifteen wide column row centered grid" id="modifier_grid<?php echo $id ?>">
                    <h2 class="ui left aligned header"><i class=" icons">
                            <i class="users icon"></i>
                            <i class="corner add icon"></i>
                        </i>&nbsp;modifier le client</h2>
                    <form method="POST" class="ui form" id="modifier_form<?php echo $id ?>" action="update_client.php?id=<?php echo $id ?>">
                        <div class="two fields">
                            <div class="field">
                                <label>Nom</label>
                                <input type="text" name="first_name" placeholder="Nom de client">
                            </div>
                            <div class="field">
                                <label>Prenom</label>
                                <input type="text" name="last_name" placeholder="Prenom de client">
                            </div>

                        </div>
                        <div class="three fields">
                            <div class="field">
                                <label style="">Adress</label>
                                <input type="text" name="adresse" placeholder="Adresse" >
                            </div>
                            <div class="field">
                                <label>E-mail</label>
                                <input type="Email" name="email" placeholder="exemple@gmail.com">
                            </div>
                            <div class="field">
                                <label>Telephon</label>
                                <input type="text" name="mobile_phone" placeholder="">
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

                first_name: {
                    identifier: 'first_name',
                    rules: [{
                            type: 'empty',
                            prompt: 'manque un nom'
                        },

                    ]
                },
                last_name: {
                    identifier: 'last_name',
                    rules: [{
                            type: 'empty',
                            prompt: 'manque un prenom'
                        },

                    ]
                },
                adresse: {
                    identifier: 'adresse',
                    rules: [{
                            type: 'empty',
                            prompt: 'manque une adresse'
                        },

                    ]
                },
                email: {
                    identifier: 'email',
                    rules: [{
                            type: 'empty',
                            prompt: 'manque un email'
                        },

                    ]
                },
                mobile_phone: {
                    identifier: 'mobile_phone',
                    rules: [{
                            type: 'number',
                            prompt: 'manque un numero telephon'
                        },

                    ]
                }
              

            }
        });


$('#modifier_form<?php echo $id ?>')

  .form('set values', {
    first_name     : '<?php echo h($client->first_name); ?>',
    last_name  : '<?php echo h($client->last_name); ?>',
    adresse    : '<?php echo h($client->adresse); ?>',
    email      : '<?php echo h($client->email); ?>',
    mobile_phone   : '<?php echo h($client->mobile_phone); ?>',
    terms      : true
  })
;
    </script>


    