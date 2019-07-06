<?php

/** Form Credentials */
$form_token = get_form_token('su_login_form');
$form_action = 'su_login';
global $form_error;

/** Form Submit Button */
$fsb_name = 'Login';
$fsb_class = 'btn btn-primary btn-rounded'; ?>

<div class="body-content nice-scroll bg-light-grey">
  <div class="centered-layout-container">
    <div class="bg-dark-default">
      <div>
        <div class="install-form-base">
          <div>

            <?php insert_template('/instances/gateway/templates/header/title.php', null, true); ?>

            <div class="cyz-fb-title">
            <?php if(count($form_error) > 0): ?>
            <?php foreach($form_error as $error): ?>
              <div class="title-block bg-danger">
                <p class="text-white">
                  <span class="cyz-ico cyz-ico-error"></span>
                  <span><strong>ERROR:</strong> <?php echo $error; ?></span>
                </p>
              </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="title-block bg-secondary">
                <p class="text-white">
                  <span class="cyz-ico cyz-ico-person"></span>
                  <span>Super User Login</span>
                </p>
              </div>
            <?php endif; ?>
            </div>

            

            <div class="cyz-fb-body">
              <div>
                <form class="text-left" method="post" action="<?php echo get_current_url(); ?>">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="username-help" placeholder="Enter Username" value="" required>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="password-help" placeholder="Enter Password" value="">
                    <a class="link-below-input link" href="#">Forgot Password?</a>
                  </div>

                  <div class="form-group checkbox">
                    <p><input type="checkbox" class="form-control" name="remember-me" value="yes" required><span>Remember Me</span></p>
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
