<?php 
require_once("../includes/initialize.php");
?>

<style>

.ui.left.aligned.header{

margin-top: 1% !important;
}
.twelve.wide.column h2{
  margin-top: 1%;
  margin-bottom: 1%;
}
#rating{
  margin-top: 3%;
}
.err{
  background-color: #FE1100 !important;
  color: white;
}

.war{
  background-color: #E4FE19;
  color: black;
}

</style>

<div class="ui fluid container">

<?php 
if(!$id){
  redirect_to('index.php');
}

$clients = Order_piece::find_by_id($id);
?>
    <div class="ui padded grid">
      <!-- begin row head-->
                        

                    <div class="centered row">

                      <div class="ui segment eight wide centered column">

                            <div class="ui centered grid">
                                
                                <div class="ui centered grid row">
                                          
                                          <div class="middle aligned four wide column">
                                          <img src="<?php echo url_for('images/important.svg'); ?>" alt="" class="ui small  circular centered image">
                                          </div>

                                          <div class="twelve wide column">
                                          <?php foreach($clients as $client){ ?>
                                          <h3>commande N° <?php echo h($client->id);?> &nbsp; <?php echo h($client->id);?></h3>
                                          <h4><strong>prix :</strong><?php echo h($client->sale_price)." <br>quantity :".$client->quantity;?></h4>
                                   
                                         <?php } ?>
                                          </div>
                                </div>
                                
                                    
                                    <div class="ui centered grid row">
                                    
                                                      
                                   

                                    </div>
                            </div>
                      </div>
                    
                    </div>
                          <div class="row">
                          </div>

                  
                            <div class="ui bottom attached tab segment" data-tab="secondAfficher">
                        
                            </div>
                                      
                            </div>
                            
                            </div>
                    


            
           
</div>         

      <!-- end row head-->



        </div>
     





  

      <script>

$('.ui.rating')
  .rating()
;

$('.menu .item')
  .tab()
;
</script>


