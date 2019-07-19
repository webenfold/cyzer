<?php


/** Include Apache HTACCESS setup file */
attach_controller('/gateway/login.php', 'cyz_admin');


/** Attach Install View Header */
insert_template('/templates/general/head.php', null, true);


/** Get Welcome View Instance Template */
insert_template('/instances/gateway/body/login.php', null, true);


/** Get Footer */
insert_template('/templates/general/footer.php', null, true);
