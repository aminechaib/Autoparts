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
.open_comp{
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


                    <h1 class="ui  header item"><i class="users icon"></i>Voiture</h1>
            
                    <div class="right item">
                        <a href="add_compatible.php" class="">
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
                                <th>Reference</th>
                                <th>Nom Piece</th>
                                <th>Moteur</th>
                                <th>date de creation</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                               $voitures = Voiture::find_all();
                               //var_dump($voitures);exit;
                               if($voitures)
                               {
                                   foreach($voitures as $voiture){
                               ?>
                               <tr>
                                    <td><?php echo h($voiture->id); ?></td>
                                    <?php
//                                      $result = $voiture->piece_name($voiture->id_piece);
// if ($result !== false) {
//     var_dump($result);
// } else {
//     echo "No matching piece found.";
// }exit;
?>
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