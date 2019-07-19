<?php

/** CYZ VR: View Resources */
$resource_dir = get_admin_assets_dir_url(); ?>

<div id="body-container" class="body-container transition bg-secondary">
  <div class="body-content nice-scroll bg-light-grey">

    <div class="container-fluid py-6 px-4">

      <div class="alerts-list">
        <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

      <div class="mb-6">
        <h1 class="page-header p-3">
          <span>Dashboard</span>
        </h1>
      </div>

      <div id="drag-able" class="row widget-single">

        <div class="col-lg-12 col-md-12 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 1</h2>
              <span class="cyz-ico first cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-8 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 1</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 2</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 3</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 4</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 5</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 6</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-5 widget">
          <div class="widget-body">
            <div class="header px-3">
              <h2 class="title">Widget Title 7</h2>
              <span class="cyz-ico cyz-ico-up-arrow widget-minimize"></span>
            </div>
            <div class="body">
              <div class="p-3">
                <p>Widget Content</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <div id="swipe-h"></div>

  <!-- Attach Display Footer -->
  <?php insert_template('/templates/footer/display-footer.php', null, true); ?>
</div>
