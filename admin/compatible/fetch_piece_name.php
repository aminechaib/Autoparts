<option value="">Piece..</option>

  <?php foreach ($pieces as $piece) {
                                // var_dump($piece);
                                   ?>
                                <option value="<?php echo $piece->id; ?>">  <?php echo $piece->reference."<-->".$piece->piece_name; ?></option> <?php
                               }?>



      





