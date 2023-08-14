<option value="">Mark..</option>
                               <?php foreach ($marks as $mark) {
                                   ?>
                                <option value="<?php echo $mark->id; ?>">  <?php echo $mark->name; ?></option>

                                <?php
                               }?>



