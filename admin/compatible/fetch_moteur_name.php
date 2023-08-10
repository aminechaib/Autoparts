


                          <option value="">Moteur..</option>
                          <?php foreach ($moteurs as $moteur) {
                                   ?>
                                <option value="<?php echo $moteur->id; ?>">  <?php echo $moteur->name."  ".$moteur->puissance."ch"; ?></option>
                                <?php
                               }?>







