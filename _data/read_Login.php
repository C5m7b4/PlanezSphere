<?php
	include_once "../_includes/headers.php";

	
	if ( isset($_POST['username']))
	{
		if ( isset($_POST['password']))
		{
			$username = cleanseSql(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
			$password = cleanseSql(filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS));
			$hashedPassword = sha1($password);
			$userQuery = "select users.id,username,password,companyid,companyName,userlevel,securityquestion,convert(varchar(20),lastvisit,102) + ' ' + convert(varchar(20),lastvisit,108) as lastvisit,forgotpassword from users join companies on companies.id=users.companyid where username='{$username}'";
			logIt($userQuery,'users','planezsphere');
			
			$userResults = odbc_exec($connection,$userQuery);
			if ( $userResults )
			{
				$userPasses = false;
				$foundUsername = false;
				while($row = odbc_fetch_array($userResults))
				{
					$foundUsername = true;
					if ( $hashedPassword == $row['password'])
					{						
						//we have our user,  now we need to store some information into their session
						$_SESSION['userid'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['companyid'] = $row['companyid'];
						$_SESSION['companyname'] = $row['companyName'];
						$_SESSION['userlevel'] = $row['userlevel'];
						//now we can determine if the user needs to setup their security question 
						//or change their password or both
						$returncode = 0;
						if ( $row['forgotpassword'] == '1' )
						{
							if ( $row['securityquestion'] == '0')
							{
								$returncode = '11';
							}
							$returncode ='10';
						}
						else
						{
							if ( $row['securityquestion'] == '0')
							{
								$returncode = '01';
							}
						}
						if ( $returncode == '0')
						{
							echo '{success:true,error:0}';
							return;	
						}
						else
						{
							echo '{success:true,error:'.$returncode.'}';
							return;
						}
						
					}
				}
				if ( $foundUsername == true)
				{
					//bad password
					echo '{success:true,error:5}';					
				}
				else
				{
					//bad username
					echo '{success:true,error:4}';	
				}				
			}
			else
			{
				//no data returned
				echo '{success:true,error:3}';	
			}
		}
		else
		{
			//no password
			echo '{success:true,error:2}';	
		}
	}
	else
	{
		//no username
		echo '{success:true,error:1}';	
	}

?>