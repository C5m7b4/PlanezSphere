<?php
	require_once"../_includes/headers.php";
	if ( isset($_POST['username']))
	{
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
		$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
		$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
		$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
		$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
		$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS);
		$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_SPECIAL_CHARS);
		$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
		$active = filter_input(INPUT_POST, 'active', FILTER_SANITIZE_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
		$userlevel = filter_input(INPUT_POST, 'userlevel', FILTER_SANITIZE_SPECIAL_CHARS);
		$hashedPassword = sha1($password);
		
		if ( $active == 'true' || $active == '1')
		{
			$active = '1';
		}
		else
		{
			$active = '0';			
		}
		
		$user = "insert into users (firstname,lastname,username,email,phone,address,city,state,zip,active,userlevel,forgotpassword,securityquestion,password) values ('{$firstname}','{$lastname}','{$username}','{$email}','{$phone}','{$address}','{$city}','{$state}','{$zip}','{$active}','{$userlevel}',1,0,'{$hashedPassword}')";
		logIt($user,'users','planezsphere');
		
		if ( odbc_exec($connection,$user))
		{
			echo '{success:true,error:0}';
		}
		else
		{
			echo '{success:true,error:2,msg:Internal Error,Error:530}';			
		}
	}
	else
	{
		echo '{success:true,error:1,msg:No Username Found,Error:529}';
	}
?>