<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['search'] = 'welcome/search';
$route['edu-admin/index'] = 'admin/index';
$route['edu-admin/signin'] = 'admin/signin';
$route['edu-admin/signup'] = 'admin/signup';
$route['edu-admin/dashboard'] = 'admin/dashboard';
$route['edu-admin/logout'] = 'admin/logout';
$route['edu-admin/all_students'] = 'admin/all_students';
$route['edu-admin/add_new_student'] = 'admin/add_new_student';
$route['edu-admin/add_result'] = 'admin/add_result';
$route['edu-admin/update_result'] = 'admin/update_result';
$route['edu-admin/delete_student'] = 'admin/delete_student';
$route['edu-admin/add_new_student_data'] = 'admin/add_new_student_data';
$route['edu-admin/admin_data'] = 'admin/admin_data';
$route['view/(.+)'] = 'admin/view/$1';
$route['delete/(.+)'] = 'admin/delete/$1';
$route['add_marks/(.+)'] = 'admin/add_marks/$1';
$route['add_student_mark/(.+)'] = 'admin/add_student_mark/$1';
$route['update_result/(.+)'] = 'admin/update_result/$1';
$route['edit_marks'] = 'admin/edit_marks';
$route['searchstudent'] = 'admin/searchstudent';


