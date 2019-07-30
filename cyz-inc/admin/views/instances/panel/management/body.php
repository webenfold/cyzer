<?php

$response = check_cyzer_update();

$cyzer_up_db = new CYZ_JDB(CYZ_GEN.'/jdb/');

$cyzer_up_db->db_init('cyz_update');

$cur_upd_status = $cyzer_up_db->get_column_data('core_updates', 0, 'update-status');

if(!$cur_upd_status) $cur_upd_status = "download-core-update";
?>

<div id="body-container" class="body-container transition bg-secondary">
  <div class="body-content nice-scroll bg-light-grey">

    <div class="container-fluid py-6 px-4">
    
      <div class="mb-6">
        <h1 class="page-header p-3">
          <span>Cyzer Update</span>
        </h1>
      </div>

      <div class="fixed-block">
        <div class="body">        

        <?php if($response[0]): ?>
          <div class="row align-items-center px-3">
            <div class="col-lg-2 col-sm-12">
              <div class="update-icons">
                <span class="cyz-ico cyz-ico-error-solid"></span>
              </div>
            </div>
            <div class="col-lg-10 col-sm-12">
              <p><span>New version of Cyzer (V <?php echo $response[1]; ?>) is available. You have outdated Cyzer (V <?php echo CYZ_VERSION; ?>). Update Cyzer now for better security.</span></p>
              <p class="mt-4">
                <a class="btn cta-primary btn-rounded px-2 cyz-update" href="#" data-update="<?php echo $cur_upd_status; ?>">Download And Install Update</a>
              </p>
            </div>
          </div>
        <?php else: ?>
          <div class="row align-items-center px-3">
            <div class="col-lg-2 col-sm-12">
              <div class="update-icons">
                <span class="cyz-ico cyz-ico-check-circle-solid"></span>
              </div>
            </div>
            <div class="col-lg-10 col-sm-12">
              <p><span>Congratulations! Latest version of Cyzer framework (V <?php echo get_cyzer_updated_version(); ?>) is installed. Automatic update is also enabled! So, Cyzer will update automatically while you focus on more important tasks. If you want to rollback the last update, follow the documentation.</span></p>
            </div>
          </div>
        <?php endif; ?>

        </div>
      </div>

    </div>

  </div>

  <div id="swipe-h"></div>

  <!-- Attach Display Footer -->
  <?php insert_template('/templates/su-panel/sub-footer.php', null, true); ?>
</div>
