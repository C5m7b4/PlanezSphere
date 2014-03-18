<?php
	include_once "../_includes/headers.php";
	
	if ( isset($_POST['name']))
	{
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		$address = filter_input(INPUT_POST,'address', FILTER_SANITIZE_SPECIAL_CHARS);
		$city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_SPECIAL_CHARS);
		$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS);
		$zip = filter_input(INPUT_POST,'zip', FILTER_SANITIZE_SPECIAL_CHARS);
		$contact = filter_input(INPUT_POST,'contact', FILTER_SANITIZE_SPECIAL_CHARS);
		$phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_SPECIAL_CHARS);
		$active = filter_input(INPUT_POST,'active', FILTER_SANITIZE_SPECIAL_CHARS);
		$createdate = addHoursToTime(0);
		
		//debug technique
		logIt('active='.$active,'users','planezsphere');
		if ( $active == 'true')
		{
			$active = '1';
		}
		else if ( $active == 'false')
		{
			$active = '0';
		}
		logIt('active='.$active,'users','planezsphere');
		
		$comp = "insert into companies (companyname,createdate,address,city,state,zip,phone,contactid,active) values ('{$name}','{$createdate}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$contact}','{$active}')";
		logIt($comp,'companies','planezsphere');
		
		if ( odbc_exec($connection,$comp))
		{
			echo '{success:true,error:0}';
		}
		else
		{
			echo '{success:true,error:2,msg:Internal Error Occured,Error:526}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg:Company Name not found,Error:525}';
	}
?>