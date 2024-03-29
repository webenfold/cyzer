<?php


/** Include Apache HTACCESS setup file */
attach_controller('/gateway/session-verify.php', 'cyz_admin'); ?>



<!-- Attach SU Panel Header -->
<?php insert_template('/templates/header/header.php', null, true); ?>



<div class="content-base">

  <!-- Attach SU Panel Navigation -->
  <?php insert_template('/templates/header/nav.php', null, true); ?>
  
  <!-- Attach SU Panel Body -->
  <?php insert_template('/instances/editor/app-editor/body.php', null, true); ?>

</div>



<!-- Attach SU Panel Footer -->
<?php insert_template('/templates/footer/footer.php', null, true);
