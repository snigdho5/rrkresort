<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main/index';
$route['404_override'] = 'Auth/get404';
$route['translate_uri_dashes'] = FALSE;

//admin panel>>

//login
$route['admin'] = 'Auth/index';
$route['admin/login'] = 'Auth/onSetLogin';
$route['admin/chk_login'] = 'Auth/onCheckLogin';
$route['admin/chklogin2fa'] = 'Auth/onCheck2FAuth';
$route['admin/logout'] = 'Auth/onSetLogout';
$route['admin/dashboard'] = 'Auth/onGetDashboard';
$route['admin/send-password-recovery'] = 'Auth/onSendPasswordRecovery';

//user management
$route['admin/users'] = 'Users/index';
$route['admin/duplicate_check_un'] = 'Users/onCheckDuplicateUser';
$route['admin/add-user'] = 'Users/onCreateUserView';
$route['admin/createuser'] = 'Users/onCreateUser';
$route['admin/profile'] = 'Users/onGetUserProfile/';
$route['admin/profile/(:any)'] = 'Users/onGetUserProfile/$1';
$route['admin/changeprofile'] = 'Users/onChangeUserProfile';
$route['admin/deluser'] = 'Users/onDeleteUser';
$route['admin/enable2fa'] = 'Users/onGetTwoFACode';
$route['admin/set2fa'] = 'Users/onSet2FAuth';

//room management
$route['admin/rooms'] = 'Rooms/index';
$route['admin/duplicate_check_room'] = 'Rooms/onCheckDuplicate';
$route['admin/add-room'] = 'Rooms/onCreateView';
$route['admin/createroom'] = 'Rooms/onCreate';
$route['admin/edit-room/(:any)'] = 'Rooms/onGetEdit/$1';
$route['admin/changeroom'] = 'Rooms/onChange';
$route['admin/delroom'] = 'Rooms/onDelete';

$route['admin/upload-room-images/(:any)'] = 'Rooms/onGetUploadImages/$1';
$route['admin/fileupload'] = 'Rooms/onUploadFile';
$route['admin/delroomimg'] = 'Rooms/onDeleteRoomImage';

$route['admin/room-availability/(:any)'] = 'Rooms/onGetRoomAvailability/$1';
$route['admin/add-availability'] = 'Rooms/onAddRoomAvailability';
$route['admin/delroomavl'] = 'Rooms/onDeleteRoomAvailability';

$route['admin/booking-details/(:any)'] = 'Rooms/onGetBookingDetails/$1';
//front end>>

