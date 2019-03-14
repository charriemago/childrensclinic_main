<?php
	
	define('SERVERTYPE' , 'local');
	define('URL', SERVERTYPE == 'local' ? '/childrensclinic_main/mobile/' : '/mobile/');
	
	date_default_timezone_set('Asia/Taipei');
	
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);

	define('DATABASE_HOST', SERVERTYPE == 'local' ? 'localhost' : 'localhost');
	define('DATABASE_USER', SERVERTYPE == 'local' ? 'root' : 'id8601971_root');
	define('DATABASE_PASS', SERVERTYPE == 'local' ? '' : 'db_clinic');
	define('DATABASE_NAME', SERVERTYPE == 'local' ? 'db_clinic' : 'id8601971_db_clinic');

	ini_set('display_errors', 1);
	error_reporting(E_ALL);