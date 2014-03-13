<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	putenv("ODBCINSTINI=/opt/local/etc/odbcinst.ini");
	putenv("ODBCINI=/opt/local/etc/odbc.ini");
	$server = "RPMS_2";
	$user="SA";
	$password="5scully5";
	$db = "RPMS_2";
	$connection = odbc_connect($server, $user, $password) or die('could not connect to sql server');
	
	if (!$connection)
	{
		echo "Database connection failed";
	}
	
	odbc_exec($connection, "use ".$db);


?>