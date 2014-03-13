<?php
	require_once "../_includes/headers.php";
	if ( !isset($_SESSION['userid']))
	{
		redirect_to('../index.php');
	}

	if ( isset($_POST['username']))
	{
		if ( isset($_POST['password']))
		{
			$username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
			$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
			$hashed = sha1($password);
			$update = "update users set password='{$hashed}' where username='{$username}'";
			logIt($update,'users','planezsphere');
			
			if ( odbc_exec($connection,$update))
			{
				echo '{success:true,error:0}';
			}
			else
			{
				echo '{success:true,error:3,msg:Server Error,Error:519,blank:1}';
			}
		}
		else
		{
			echo '{success:true,error:2,msg:No Password found,Error:518,blank:1}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg:No Username Found,Error:517,blank:1}';
	}
	
?>