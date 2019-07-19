<?php


/** Include Apache HTACCESS setup file */
attach_controller('/gateway/session-verify.php', 'cyz_admin');


/** Include Apache HTACCESS setup file */
attach_controller('/panel/application/deployment/main.php', 'cyz_admin'); ?>


<!-- Attaching HTML Head -->
<?php insert_template('/templates/general/head.php', null, true); ?>


<!-- Attaching Header -->
<?php insert_template('/templates/su-panel/header.php', null, true); ?>


<div class="content-base">


  <!-- Attach SU Panel Navigation -->
  <?php insert_template('/templates/su-panel/nav.php', null, true); ?>

  
  <!-- Attach SU Panel Body -->
  <?php insert_template('/instances/panel/application/body.php', null, true); ?>


</div>


<!-- Attaching Sub Footer -->
<?php insert_template('/templates/su-panel/sub-footer.php', null, true); ?>


<!-- Attaching HTML Footer -->
<?php insert_template('/templates/general/footer.php', null, true); ?>
