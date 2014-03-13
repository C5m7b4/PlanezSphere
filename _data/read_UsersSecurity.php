<?php
	require_once "../_includes/headers.php";
	if ( !isset($_SESSION['userid']))
	{
		redirect_to('../index.php');
	}
	
	if ( isset($_POST['username']))
	{
		$user = "select users.id, username, securityquestion,question, answer,email from users join security on users.securityquestion=security.id";
		logIt($user,'users','planezsphere');
		
		$userResults = odbc_exec($connection,$user);
		if ($userResults)
		{
			while($row = odbc_fetch_array($userResults))
			{
				$myArray[] = array(
					'success'=>'true',
					'error'=>'0',
					'id'=>$row['id'],
					'username'=>$row['username'],
					'securityquestion'=>$row['securityquestion'],
					'answer'=>$row['answer'],
					'question'=>$row['question'],
					'email'=>$row['email']
				);
			}
			if ( isset($myArray))
			{
				if ( sizeof($myArray) > 0 )
				{
					$output = json_encode($myArray);
					echo $output;
				} 
				else
				{
					echo '{success:true,error:4,msg:User not found,Error:520,blank:1}';
				}
			}
			else
			{
				echo '{success:true,error:3,msg:User not found,Error:519,blank:1}';
			}
		}
		else
		{
			echo '{success:true,error:2,msg:Nothing returned,Error:518,blank:1}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg:No Username found,Error:517,blank:1}';
	}

?>