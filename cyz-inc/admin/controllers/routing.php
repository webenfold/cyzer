<?php

add_route_su('/'.SU_SLUG.'/', '/instances/panel/dashboard.php');

add_route_su('/'.SU_SLUG.'/login/', '/instances/gateway/login.php');

add_route_su('/'.SU_SLUG.'/logout/', '/instances/gateway/logout.php');

add_route_su('/'.SU_SLUG.'/app-deploy/', '/instances/panel/application/deployment.php');

add_route_su('/'.SU_SLUG.'/app-model/', '/instances/panel/app-model/app-model.php');

add_route_su('/'.SU_SLUG.'/app-view/', '/instances/panel/app-view.php');

add_route_su('/'.SU_SLUG.'/app-view-editor/', '/instances/editor/app.editor.php');


// Profile Section
add_route_su('/'.SU_SLUG.'/profile/', '/instances/panel/profile.php');


// AJAX
add_route_su('/'.SU_SLUG.'/ajax-app-upload/', '/instances/ajax/app-deploy/upload.php');

// AJAX Get Static View
add_route_su('/'.SU_SLUG.'/ajax-sv/', '/instances/ajax/app-views/view.static.php');

// AJAX Code Edit Static View
add_route_su('/'.SU_SLUG.'/ajax-ce-sv/', '/instances/ajax/get-code/get-code.static.php');

add_route_su('/'.SU_SLUG.'/ajax-app-model/', '/instances/ajax/app-model/get-jdb-tables.php');
