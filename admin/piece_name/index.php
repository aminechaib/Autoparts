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
.open_piece_name{
        border-right:3px solid #119ee7;
        
        }
        </style>

<div class="page">

    <div class="ui fluid container">

        <?php include('../includes/menu_head.php'); ?>

        <div class="ui padded grid">


            <?php 


?>
            <div class="ui fifteen wide column row centered grid segment">

                <div class="ui pointing secondary big menu">


                    <h1 class="ui  header item"><i class="users icon"></i>Piece_name</h1>


                  

                                   
                    <div class="right item">
                        <a href="add_piece.php" class="">
                            <i class="big plus circle icon"></i>

                        </a>
                        <div class="ui search  " id="load_search">
                                           <div class="ui icon input">
                                               <input class="prompt" type="text" placeholder="chercher..."
                                                   id="search">  
                                               <i class="search icon"></i>
                                           </div>
                                           <div class="results">
                                           </div>
                                   </div>
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
                                <th>photo</th>
                                <th>creation date</th>
                                <th>categorie</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                        //    $piece_n = Piece_name::find_all();
                        //    if($piece_n){
                        //     foreach($piece_n as $pie){
                        //         echo h($pie->category_name($pie->id_categorie)->name);
                        //     }
                        
                        // };
                              
                        $pieces = piece_name::find_all_names();
                                 if($pieces){
                                   foreach($pieces as $piece){
                               ?>
                                   <tr>
                                   <td><?php echo h($piece->id);?></td>
                                   <td><?php echo h($piece->name);?></td>
                                   <td><?php echo h($piece->photo);?></td>
                                   <td><?php echo h($piece->creation_date);?></td>
                                   <td><?php echo h($piece->categorie_name($piece->id_categorie)->name);?></td>
                                   <td>
                                       <button class="ui tiny yellow  button"
                                           data-button_id="<?php echo h($piece->id) ?>" data-type="modifier"><i
                                               class="edit outline icon"></i><span>Modifier</span></button>
                                       <div class="ui modal modifier m<?php echo h($piece->id, '') ?>">
                                           <div class="content">
                                               <?php modifier_modal($piece->id, '') ?>
                                           </div>
                                       </div>
                                   </td>
                                   
                                   <td>
                                    <button class="ui tiny red button" data-button_id="<?php echo h($piece->id) ?>"
                                        data-type="supprimer">
                                        <i class="user slash icon"></i><span>Supprimer</span></button>

                                    <div class="ui modal supprimer s<?php echo h($piece->id) ?>">
                                        <?php supprimer_modal($piece->id, ''); ?>
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