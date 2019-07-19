<?php


// Dashboard
add_route_su('/'.SU_SLUG.'/', '/instances/panel/dashboard/dashboard.php');

// Core Update
add_route_su('/'.SU_SLUG.'/core-update/', '/instances/panel/management/core-update.php');

// Application Deploy
add_route_su('/'.SU_SLUG.'/app-deploy/', '/instances/panel/application/deployment.php');

// App Model
add_route_su('/'.SU_SLUG.'/app-model/', '/instances/panel/app-model/app-model.php');

// App View
add_route_su('/'.SU_SLUG.'/app-view/', '/instances/panel/app-view/app-view.php');

// Profile Section
add_route_su('/'.SU_SLUG.'/profile/', '/instances/panel/profile/profile.php');





// Gateway Login
add_route_su('/'.SU_SLUG.'/login/', '/instances/gateway/login.php');

// Gateway Logout
add_route_su('/'.SU_SLUG.'/logout/', '/instances/gateway/logout.php');




// Editor Instance
add_route_su('/'.SU_SLUG.'/app-view-editor/', '/instances/editor/app.editor.php');




// Ajax Core update
add_route_su('/'.SU_SLUG.'/manage-update-rep/', '/instances/ajax/updates/core-update.php');

// AJAX
add_route_su('/'.SU_SLUG.'/ajax-app-upload/', '/instances/ajax/app-deploy/upload.php');

// AJAX Get Static View
add_route_su('/'.SU_SLUG.'/ajax-sv/', '/instances/ajax/app-views/view.static.php');

// AJAX Code Edit Static View
add_route_su('/'.SU_SLUG.'/ajax-ce-sv/', '/instances/ajax/get-code/get-code.static.php');

// REST API EP - Fetch JDB Tables
add_route_su('/'.SU_SLUG.'/ajax-app-model/', '/instances/ajax/app-model/get-jdb-tables.php');
