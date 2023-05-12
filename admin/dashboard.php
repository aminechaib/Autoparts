<?php require_once('includes/initialize.php') ;

require_login();


include('includes/app_head.php');
?>
<?php include('includes/menu_head.php'); ?>
<?php $bool = $_SESSION['toast'] ?? false; ?>
<div class="page">

    <div class="ui fluid container">

        <?php
            function get_percent($row_tot,$row_side)
            {
                if($row_tot>0){
                    $int = $row_side*100/$row_tot;
                    $percent =  round($int,0);
                }
                else {
                    $percent = 0;
                }

                return $percent;
            }
        ?>
        <style>
        .ui.fluid.card {
            height: 65vh;
            overflow: scroll;
        }
        #left{
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        .open_dash{
        border-right:3px solid #119ee7;
        
        }
        </style>



        <?php $row_cl = Client::rows_tot(); ?>
        <!-- begin row stats-->
        <div class="ui row equal width padded grid" id="example1">
            <div class="column">
                <div class="ui card">
                    <div class="ui statistics content">
                        <div class=" ">
                            <div class="ui grid ">
                                <div class="row">
                                    <h4 class="column"> <i class="users large icon"></i>Total clients</h4>
                                </div>
                               <div class="ui row centered grid">
                                   <div class="ten wide column">
                                   <div class="ui horizontal large statistic">
                                    <div class="value">
                                        <?php echo $row_cl;?>
                                    </div>
                                    <div class="label">
                                        Clients
                                    </div>
                                </div>
                                   </div>
                               </div>


                                <div class="centered row">
                                    <div class="canvas">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="column">
                <div class="ui card">
                    <div class="ui statistics content">
                        <div class=" ">
                            <div class="ui grid ">
                                <div class="row">
                                    <h4 class="column"> <i class="users large icon"></i>...........</h4>
                                </div>
                               <div class="ui row centered grid">
                                   <div class="ten wide column">
                                   <div class="ui horizontal large statistic">
                                    <div class="value">
                                        <?php echo '';?>
                                    </div>
                                    <div class="label">
                                        .......
                                    </div>
                                </div>
                                   </div>
                               </div>


                                <div class="centered row">
                                    <div class="canvas">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="column">
                <div class="ui card">
                    <div class="ui statistics content">
                        <div class=" ">
                            <div class="ui grid ">
                                <div class="row">
                                    <h4 class="column"> <i class="users large icon"></i>...........</h4>
                                </div>
                               <div class="ui row centered grid">
                                   <div class="ten wide column">
                                   <div class="ui horizontal large statistic">
                                    <div class="value">
                                        <?php echo '';?>
                                    </div>
                                    <div class="label">
                                        .......
                                    </div>
                                </div>
                                   </div>
                               </div>


                                <div class="centered row">
                                    <div class="canvas">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>   
        </div>

        <!-- end row stats-->

        <!-- begin row tables-->

        <div class="ui row equal width  padded  grid">

        </div>
        <!--fin grid-->
        <!-- end row tables-->

    </div>

</div>

</div>

<?php 

if(isset($_POST['supprimer'])){

echo "<script>alert('supprimer');</script>";
}

?>


<script src="dist/Chart.bundle.js"></script>
<script src="dist/jquery.circliful.js"></script>

<script>
$(document).ready(() => {
    <?php
if($bool){
    echo "
    $('body')
 .toast({
   class: 'success',
  
    message: ` ".  $_SESSION['toastType'] ." a été effectuée avec succés!`
 })
;
    ";
}    
$_SESSION['toast'] = false;
?>

})

$(function() {


    // Write on keyup event of keyword input element
    $("#search").keyup(function() {
        $('#load_search').toggleClass('loading');
        var searchText = $(this).val().toLowerCase();
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf(searchText) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });






    $('.ui.progress').progress();

    // js toggle example "1"
    $("#leftbar-toggle").click(function() {
        event.preventDefault();
        $("body").toggleClass("opened");
    });

    // js toggle example "2"
    /*
     $(".leftbar").hover(function() {
       $("body").toggleClass("opened");
     });
     */
    // js toggle example "3"
    // $("#leftbar-toggle").click(function() {
    //   $("body").toggleClass("opened");
    // });

});

var ctx = document.getElementById("myChart1");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',

    data: {
        labels: ["Particulier", "Professionel"],

        datasets: [{
            data: [<?php echo '';?>,
                <?php echo '';?>
            ],
            backgroundColor: [
                '#2b2e4a',
                '#119ee7',

            ]

        }]
    },

    options: 0
});


var ctx = document.getElementById("myChart2");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',

    data: {
        labels: ["Espece", "Chèque", "CCP"],

        datasets: [{
            data: [<?php echo get_percent($rows_tot,$rows_cache);?>,
                <?php echo get_percent($rows_tot,$rows_type_cheque);?>,
                <?php echo get_percent($rows_tot,$rows_ccp);?>
            ],
            backgroundColor: [
                '#119ee7',
                '#e84545',
                '#2b2e4a'

                // '#2b2e4a',
                // '#e84545',
                // '#903749'

            ]

        }]
    },

    options: 0
});

var ctx = document.getElementById("myChart3");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',

    data: {
        labels: ["Domaine", "Domaine+pack"],

        datasets: [{
            data: [<?php echo get_percent($row_cl,$row_hyb_dns);?>,
                <?php echo get_percent($row_cl,$row_hyb_else);?>
            ],
            backgroundColor: [
                '#2b2e4a',
                '#119ee7',


            ]

        }]
    },

    options: 0
});

var ctx = document.getElementById("myChart4");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',

    data: {
        labels: ["Statique", "Dynamique"],

        datasets: [{
            data: [<?php echo get_percent($row_cl,$row_con_stat);?>,
                <?php echo get_percent($row_cl,$row_con_dyn);?>
            ],
            backgroundColor: [
                '#2b2e4a',
                '#119ee7',

            ]

        }]
    },

    options: 0
});
</script>

</body>

</html>