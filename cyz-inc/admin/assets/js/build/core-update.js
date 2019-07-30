$('.cyz-update').on('click', function(){
  var status = $(this).data('update');

  if( 'download-core-update' == status ||
      'core-update-downloaded' == status  ){
    cyz_core_update(status);
  }
})
