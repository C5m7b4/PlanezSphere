<?php
	require_once "../_includes/headers.php";
	
	$contacts = "select id,firstname,lastname,username,email,phone,birthdate,address,city,state,zip,userlevel,companyid from users where active=1 order by username";
	logIt($contacts,'users','planezsphere');
	
	$contactResults = odbc_exec($connection,$contacts);
	if ( $contactResults)
	{
		while($row = odbc_fetch_array($contactResults))
		{
			$myArray[] = array(
				'id'=>$row['id'],
				'firstname'=>$row['firstname'],
				'lastname'=>$row['lastname'],
				'username'=>$row['username'],
				'email'=>$row['email'],
				'phone'=>$row['phone'],
				'birthdate'=>$row['birthdate'],
				'address'=>$row['address'],
				'city'=>$row['city'],
				'state'=>$row['state'],
				'zip'=>$row['zip'],
				'userlevel'=>$row['userlevel'],
				'companyid'=>$row['companyid']			
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
				echo '{success:true,error:3,msg=No records Returned,Error:529}';
			}
		}
		else
		{
			echo '{success:true,error:2,msg=Empty Array Returned,Error:528}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg=No Results Returned,Error:527}';
	}
?>