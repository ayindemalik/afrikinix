<!-- Inform user if they are log in not not -->
<?php if(isset($_SESSION['message'])):?>
  <div class="msg alert-<?php echo $_SESSION['type'];?>">
    <li><?php echo $_SESSION['message'];?></li>
    <!-- destroy the message to prevent noise to user one depayed -->
    <?php
      unset($_SESSION['message']);
      unset($_SESSION['type']);
    ?>
  </div>
<?php endif;?>
