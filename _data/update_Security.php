<?php
	require_once "../_includes/headers.php";
	
	if ( !isset($_SESSION['userid']))
	{
		redirect_to('../index.php');
		return;
	}
	
	if ( isset($_POST['question']))
	{
		if ( isset($_POST['answer']))
		{
			$question = filter_input(INPUT_POST,'question',FILTER_SANITIZE_SPECIAL_CHARS);
			$answer = filter_input(INPUT_POST,'answer',FILTER_SANITIZE_SPECIAL_CHARS);
			$userid = $_SESSION['userid'];
			
			$security = "update users set securityquestion={$question}, answer='{$answer}' where id={$userid}";
			logIt($security,'users','planezsphere');
			
			if ( odbc_exec($connection,$security))
			{
				echo '{success:true,error:0}';
			}
			else
			{
				echo '{success:true,error:3,msg:Server Error,Error:516,blank:1}';
			}
		}
		else
		{
			echo '{success:true,error:2,msg:No Answer found;Error:515,blank:1}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg:No Question found;Error:514,blank:1}';
	}
?>