<?php

/** Include Apache HTACCESS setup file */
attach_controller('/gateway/login.php', 'cyz_admin');


/** Attach Install View Header */
insert_template('/instances/gateway/templates/header/header.php', null, true);


/** Get Welcome View Instance Template */
insert_template('/instances/gateway/templates/body/login.php', null, true);


/** Get Footer */
insert_template('/instances/gateway/templates/footer/footer.php', null, true);
