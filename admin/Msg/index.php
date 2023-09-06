 <?php 
require_once("../includes/initialize.php");
include("../includes/app_head.php");
include('function_modal.php');



$bool = $_SESSION['toast'] ;
?>

 <style>
.ui.search .prompt{
    border-radius: 500rem !important;
}

.ui.button i {
    display: inline;
}

.limits {
    /* height: 60%; */
}
.ui.big.form select{
height: 100%;
}
.ui.fifteen.wide.column.row.centered.grid.segment {
    height: 85vh;
    overflow: scroll;
}
.open_contact{
        border-right:3px solid #119ee7;
        
        }
        </style>

<div class="page">

    <div class="ui fluid container">

        <?php include('../includes/menu_head.php'); ?>

        <div class="ui padded grid">



            <div class="ui fifteen wide column row centered grid segment">
            <?php
$msg = Piece::find_all();
$hasQuantityLessThanThree = false;

foreach ($msg as $pie) {
    if ($pie->quantity < 3) {
        $hasQuantityLessThanThree = true;
        break; // No need to continue checking if we found one
    }
}
?>

<?php if ($hasQuantityLessThanThree): ?>
    <style>
        .warning-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .warning-message {
            color: red;
            font-weight: bold;
            text-align: center;
            animation: blink 2s infinite; /* Adding animation property */
        }
        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }
    </style>
    <div class="warning-container">
        <div class="warning-message">
            Votre stock de pièces est sur le point de s'épuiser!
        </div>
    </div>
<?php endif; ?>

                <div class="ui pointing secondary big menu">


                    <h1 class="ui  header item"><i class="clipboard list icon"></i>Contacts</h1>


                  

                                   
                
                      
                                           <div class="results">
                                          
                                  
                    </div>
                </div>
              
                <div class="ui bottom attached tab  active limits" data-tab="first">


                    <?php 
/////////////////////////////////////////////////////////////////////:::

?>

                    <table class="ui striped  table" id="tabAll">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>prenom</th>
                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                               $msgs = Msg::find_all(); 
                               if($msgs){
                                   foreach($msgs as $msg){
                                    //  var_dump($msg);
                               ?>
                               <tr>
                                   <td><?php echo h($msg->id);?></td>
                                   <td><?php echo $msg->first_name;?></td>
                                   <td><?php echo $msg->last_name;?></td>
                                   <td>
                                    <?php
                                    $status = h($msg->status);
                                    if ($status === "PENDING") {
                                        echo '<div style="background-color: red; padding: 5px; color: white;">' . $status . '</div>';
                                    } elseif ($status === "VALIDER") {
                                        echo '<div style="background-color: green; padding: 5px; color: white;">' . $status . '</div>';
                                    } else {
                                        echo h($msg->status);
                                    }
                                    ?>
                                </td>

                                   <td><?php echo h($msg->is_deleted);?></td>
                                   <td> <button class="ui tiny blue  button"
                                            data-button_id="<?php echo h($msg->id) ?>" data-type="afficher">
                                            <a href="afficher.php?msg_id=<?php echo $msg->id; ?>">afficher</a>

                                        
                                  
                                   <td>
                                    <button class="ui tiny red button" data-button_id="<?php echo h($msg->id) ?>"
                                        data-type="supprimer">
                                        <i class="user slash icon"></i><span>Supprimer</span></button>

                                    <div class="ui modal supprimer s<?php echo h($msg->id) ?>">
                                        <?php supprimer_modal($msg->id, ''); ?>
                                    </div>
                                </td>
                                   

                                   
                               </tr>
                               <?php
                                   }
                               }
                           ?>
                        </tbody>
                    </table>





                </div>




                <!-- end row head-->



            </div>









        </div>
        <!--fin page-->

      

        <script>
        $(document).ready(() => {
           <?php
if($bool){
   echo "
   $('body')
.toast({
  class: 'success',
 
   message: `".  $_SESSION['toastType'] ."a été effectuée avec succés!`
})
;
   ";
}    
$_SESSION['toast'] = false;
?>
            $('.selection.dropdown')
                .dropdown();
            // Write on keyup event of keyword input element

            // Write on keyup event of keyword input element
            $("#search").keyup(function() {
                var searchText = $(this).val().toLowerCase();
                // Show only matching TR, hide rest of them
                $.each($("#tabAll tbody tr, #tabPro tbody tr, #tabParti tbody tr"), function() {
                    if ($(this).text().toLowerCase().indexOf(searchText) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });


            $('#selectFilter').change(function () {
                                       $(".all").hide();
                                       $("." + $(this).find(":selected").attr("id")).show();
                            });



            function modal_supprimer(id) {



                $('.ui.modal.supprimer.s' + id)
                    .modal('show');
            }

            function modal_afficher(id) {


                $('.ui.modal.afficher.a' + id)
                    .modal('show');
            }

            function modal_modifier(id) {



                $('.ui.modal.modifier.m' + id)
                    .modal('show');
            }

            $('button').click(function() {


                let button_type = $(this).data('type'); //nrecupérer type

                let button_id = $(this).data('button_id'); // njib id
                //modal_supprimer(button_id);

                switch (button_type) {
                    case 'supprimer':
                        modal_supprimer(button_id);
                        break;
                    case 'modifier':
                        modal_modifier(button_id);
                        break;
                    case 'afficher':
                        modal_afficher(button_id);
                        break;


                }
            });




            $('.menu .item')
                .tab();






        }) //fin ready
        </script>


        <?php 
require_once("../includes/app_foot.php");
?>