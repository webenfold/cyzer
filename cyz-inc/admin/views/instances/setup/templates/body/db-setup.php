<?php

$form_token = get_form_token('db_setup_form');
$form_action = 'db_setup';
$fsb_name = 'Connect to database';
$fsb_class = 'btn btn-primary btn-rounded'; ?>

<div class="body-content nice-scroll bg-light-grey">
  <div class="centered-layout-container">
    <div class="bg-dark-default">
      <div>
        <div class="install-form-base bg-dark">
          <div>

            <?php insert_template('/instances/setup/templates/header/title.php', null, true); ?>

            <div class="cyz-fb-title">
              <div class="title-block bg-secondary">
                <p class="text-white">
                  <span class="cyz-ico cyz-ico-database"></span>
                  <span>Establish Database Connection</span>
                </p>
              </div>
            </div>

            <div class="cyz-fb-body">
              <div>
                <p>Below you should enter your database connection details. If you’re not sure about these, contact your host.</p>
                <form class="text-left" method="post" action="<?php echo get_home_url().'/?setup=db'; ?>">
                  <div class="form-group">
                    <label for="database-name">Database Name</label>
                    <input type="text" class="form-control" name="database-name" id="database-name" aria-describedby="database-name-help" placeholder="Enter Database Name" value="cyzer_app" required>
                    <small id="database-name-help" class="form-text text-muted">	The name of the database you want to use with CYZER.</small>
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="username-help" placeholder="Enter Username" value="username" required>
                    <small id="username-help" class="form-text text-muted">	Your database username.</small>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="password-help" placeholder="Enter Password" value="password">
                    <small id="password-help" class="form-text text-muted">Your database password.</small>
                  </div>

                  <div class="form-group">
                    <label for="db-host">Database Host</label>
                    <input type="text" class="form-control" name="db-host" id="db-host" aria-describedby="db-host-help" placeholder="Enter Database Host" value="localhost" required>
                    <small id="db-host-help" class="form-text text-muted">You should be able to get this info from your web host, if localhost doesn’t work.</small>
                  </div>

                  <div class="form-group">
                    <label for="tb-prefix">Table Prefix</label>
                    <input type="text" class="form-control" name="tb-prefix" id="tb-prefix" aria-describedby="tb-prefix-help" placeholder="Enter Table Prefix" value="cyz_" required>
                    <small id="tb-prefix-help" class="form-text text-muted">If you want to run multiple CYZER installations in a single database, change this.</small>
                  </div>

                  <p class="text-center">
                    <?php echo we_safe_submit($form_token, $form_action, $fsb_name, $fsb_class); ?>
                  </p>
                </form>
              </div>
            </div>

            <div class="cyz-fb-footer">
              <div class="py-1">
                <a class="link" href="#">cyzer.io</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
