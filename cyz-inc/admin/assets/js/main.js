// Custom Scrollbar for all intances
function custom_scrollbar(){
  document.getElementsByClassName('body-content')[0].style.overflow = 'auto';
  var Scrollbar = window.Scrollbar;
  Scrollbar.init(document.querySelector('.nice-scroll'));
}



// Js Click as JS Link
function js_click(){
  $("[data-href]").on('click', function () {
    if($(this).is('[target=_blank]')){
      window.open($(this).attr("data-href"), '_blank');
    }else{
      window.location = $(this).attr("data-href");
    }
  });

  $("[data-link]").on('click', function () {
    var href = $('#' + $(this).attr("data-link") + '-link').attr('href');
    if(href) window.location = href;
  });

  if($('.js-click').attr('href')){
    $('.js-click').on('click', function redirect(){
      window.location = $(this).attr('href');
    });
  }
}



// Side Navigation Toggle
function toggle_menu(num) {
  if (num == 1) {
    $('#body-container, #navigation, #drawer').addClass('menu-open').bind("transitionend webkitTransitionEnd", function () {
      $('#body-container').addClass('on-flow');
    });
    document.getElementById('drawer').onclick = function () {
      toggle_menu(0)
    };
  }
  if (num == 0) {
    $('#body-container, #navigation, #drawer').removeClass('menu-open').bind("transitionend webkitTransitionEnd", function () {
      $('#body-container').removeClass('on-flow');
    });
    document.getElementById('drawer').onclick = function () {
      toggle_menu(1)
    };
  }
}
// Side Navigation Toggle using Hammer
function hammer_int(){
  var body_swap_element = document.getElementById('swipe-h');

  var options = {
    domEvents: true
  };

  var hammer = new Hammer(body_swap_element, options);

  hammer.on("swiperight", function(){  
    toggle_menu(1);
  });
  hammer.on("swipeleft", function(){  
    toggle_menu(0);
  });
}



// Disable Side Navigation Dropdown Menu
function disable_sn_dd(element){
  element.each(function(){
    var sub_m = '#sub-menu-' + $(this).data('submenu-id');

    if($(sub_m + ' > a').length == 0){
      $(this).addClass('disabled')
    }
  });
}
// Side Navigation Dropdown Menu Toggle
function sn_dd(){
  // Enable Dropdown Functionality
  $('.drop-down').on('click', function () {
    if ($(this).hasClass('opened')) {
      var sub_m = '#sub-menu-' + $(this).data('submenu-id');
      $(sub_m).removeClass('opened');
      $(this).removeClass('opened');
    } else {
      var sub_m = '#sub-menu-' + $(this).data('submenu-id');
      $(sub_m).addClass('opened');
      $(this).addClass('opened');
    }
  });

  // Disable Dropdown Functionality for blank menu
  try { disable_sn_dd($('.drop-down')); } catch (err) {}
}



// Widget Collapse Function
function widget_collapse(){
  $('.widget-minimize').on('click', function(event){
    var wid_element = $(this).parents('.widget-body');
    wid_element.children('.body').slideToggle("fast");

    var ico_button = wid_element.find('.header').children('.cyz-ico');

    if(ico_button.hasClass('cyz-ico-up-arrow')) {
      ico_button.removeClass('cyz-ico-up-arrow').addClass('cyz-ico-down-arrow');
    } else {
      ico_button.removeClass('cyz-ico-down-arrow').addClass('cyz-ico-up-arrow');
    }
  });
}
// Widget Drag Function
function widget_drag(){
  dragula([document.getElementById('drag-able')]);
}

function notify(data, type){
  console.log(data);

  $('.no-notify').remove();

  $('#notification-list').append('<tr class="alert" data-notify="' +
  type + '"><td><span class="cyz-ico cyz-ico-alert"></span></td><td><a href="#">'
  + data.replace("_", " ") + '</a></td></tr>');

  $('.alert').on('click', function(){
    if('update' == $(this).data('notify')){
      window.location = core_update;
    }
  });
}


function cyz_core_update(action = null){

  if(!action) action = "check-core-update";

  var last_update_check = Cookies.get('CYZ_CU_LC');

  if(last_update_check){
    notify(last_update_check, 'update')
  }
  
  else {
    $.ajax({
      url: manage_update_rep,
      method: "POST",
      data: {
        key:  '1234',
        action: action
      }
    }).done(function(result){

      if("check-core-update" == action){
        var data = JSON.parse(result);

        if('update-available' == data['description']){
          var msg = 'Update_Available_V_' + data['response'];
        
          Cookies.set('CYZ_CU_LC', msg, {expires: 1});
  
          notify(msg, 'update');
        }
  
        else if('update-to-date' == data['description']){
          Cookies.remove('CYZ_CU_LC');
        }
      } else {
        
      }
    }).fail(function(jqXHR, textStatus){
      console.log("Request failed: " + textStatus);
    });
  }
}


function function_sequence() {
  try { custom_scrollbar(); } catch (err) {}
  try { hammer_int(); } catch (err) {}
  try { js_click(); } catch (err) {}
  try { sn_dd(); } catch (err) {}
  try { widget_collapse(); } catch (err) {}
  try { widget_drag(); } catch (err) {}
  try { jdb_get_db(); } catch (err) {}
  try { cyz_core_update(); } catch (err) {}
  try { view_specific_function(); } catch (err) {}
}


// =========================================================
// On Load
// =========================================================
if (window.addEventListener) {
  window.addEventListener('load', function () {
    function_sequence();
  });
} else {
  window.attachEvent('onload', function () {
    function_sequence();
  });
}
