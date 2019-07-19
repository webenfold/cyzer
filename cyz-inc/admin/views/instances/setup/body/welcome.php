<div class="body-content nice-scroll bg-light-grey">
  <div class="centered-layout-container">
    <div class="bg-dark-grey">
      <div>
        <div class="install-form-base">
          <div>

            <?php insert_template('/templates/gateway/header-title.php', null, true); ?>

            <div class="cyz-fb-body">
              <div>
                <p>Welcome to CYZER. Before getting started, you should check <a class="link" href="#">CYZER installation guide</a>. CYZER need some information on the database. You will need to know the following database connection details before proceeding.</p>
                <ol class="cyz-fb-list text-left">
                  <li>Database name</li>
                  <li>Database username</li>
                  <li>Database password</li>
                  <li>Database host</li>
                  <li>Table prefix*</li>
                </ol>
                <p class="small">*Optional: if you want to run more than one cyzer framework in a single database.</p>
              </div>

              <div class="pt-2">
                <p>If you know the above listed database connection details, than just click on the button below to get started.</p>
                <p class="text-center">
                  <a class="btn cta-primary btn-rounded px-4" href="<?php echo get_home_url().'/?setup=apache'; ?>">Install CYZER</a>
                </p>
              </div>
            </div>

          <div class="cyz-fb-footer">
            <div  class="py-1">
              <a class="link" href="#">cyzer.io</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
