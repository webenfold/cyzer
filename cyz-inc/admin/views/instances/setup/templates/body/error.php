<?php
if(isset($_GET['desc']) && isset($_GET['url'])){
  $errors = unserialize(base64_decode($_GET['desc']));
  $url_retry = '/?setup='.$_GET['url'];
}else{
  $errors = ['Installation file tempered!'];
  $url_retry = '/?setup=apache';
}
?>

<div class="body-content nice-scroll bg-light-grey">
  <div class="centered-layout-container">
    <div class="bg-dark-default">
      <div>
        <div class="install-form-base bg-dark">
          <div>

            <?php insert_template('/instances/setup/templates/header/title.php', null, true); ?>

            <div class="cyz-fb-title">
              <?php foreach((array)$errors as $error): ?>
                <div class="title-block bg-danger">
                  <p class="text-white">
                    <span class="cyz-ico cyz-ico-error"></span>
                    <span><strong>ERROR:</strong> <?php echo $error; ?></span>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="cyz-fb-body">
              <div>
                <p>Error occurred during the installation. Check <a class="link" href="#">CYZER installation guide</a> to learn more about the error and how to fix it. Please fix the error and click on the retry button below, to continue the installation.</p>
                <p class="link text-center">
                  <a class="btn btn-primary btn-rounded" href="<?php echo get_home_url().$url_retry; ?>">Retry</a>
                </p>
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
