<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin_c';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login']['get'] = 'Admin_c/loginad';
$route['user/login']['get'] = 'User_c/login';
$route['logout']['get'] = 'Admin_c/logout';
$route['user/logout']['get'] = 'User_c/logout';

$route['admin/daftar']['get'] = 'Admin_c/daftarr';
$route['admin/register']['post'] = 'Admin_c/register';
$route['admin/halaman']['get'] = 'Admin_c/halaman';
$route['karyawan/data']['get'] = 'Admin_c/karyawan';
$route['project/data']['get'] = 'Admin_c/project';
$route['status']['get'] = 'Admin_c/status';
$route['karyawan/todo']['get'] = 'Admin_c/todo';
$route['project_simpan']['post'] = 'Admin_c/simpan_project';
$route['pendingg/(:num)']['get'] = 'Admin_c/pending/$1';
$route['pemilihan']['post'] = 'Admin_c/pemilihan';
$route['api/project/(:num)']['get'] = 'Admin_c/ajaxDataProject/$1';
$route['simpan/password']['post'] = 'Admin_c/simpan_password';
$route['simpan/karyawan']['post'] = 'Admin_c/simpan_karyawan';

$route['user/halaman']['get'] = 'User_c/halaman';
$route['user/list']['get'] = 'User_c/listproject';
$route['user/proses']['post'] = 'User_c/ubah_proses';
$route['user/selesai']['post'] = 'User_c/ubah_selesai';
$route['api/project/user/(:num)']['get'] = 'Admin_c/ajaxDataProject/$1';
$route['api/user/ambil/(:num)']['get'] = 'Admin_c/ajaxDataUser/$1';
$route['hapus_user/(:num)']['get'] = 'Admin_c/hapus_user';