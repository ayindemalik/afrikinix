<?php if(count($errors) > 0): ?>
  <div class="msg error alert alert-danger text-cente">
    <?php foreach ($errors as $error):?>
      <li><?php echo $error;?></li>
    <?php endforeach;?>
  </div>
<?php endif;?>
