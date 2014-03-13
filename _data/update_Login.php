<?php
	require_once "../_includes/headers.php";
	if (isset($_SESSION['id']))
	{
		if ( isset($_SESSION['userid']))
		{
			if ( isset($_POST['password']))
			{
				logIt('password='.$_POST['password']);
				$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
				$hashedPassword = sha1($password);
				logIt('hashed='.$hashedPassword);
				$id = $_SESSION['userid'];
				$update = "update users set password='{$hashedPassword}',forgotpassword=0 where id={$id}";
				logIt($update,'users','planezshere');
				if ( odbc_exec($connection,$update))
				{
					echo '{success:true,error:0}';	
				}
				else
				{
					//query rejected
					echo '{success:true,error:2,msg:Request Rejected,Error:513,blank:1}';
				}
			}
			else
			{
				//no password to set
				echo '{success:true,error:1,msg:No Password,Error:512,blank:1}';
			}
		}
		else
		{
			//no session userid
			redirect_to('index.php');
		}
	}
	else
	{
		//no session id
		redirect_to('index.php');
	}
	
?>