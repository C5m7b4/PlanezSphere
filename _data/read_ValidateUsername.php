<?php
	require_once "../_includes/headers.php";
	if ( isset($_POST['username']))
	{
		logIt('*****************','users','planezsphere');
		$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
		$query = "select count(*) as cnt from users where username like '%{$user}%'";
		logIt($query,'users','planezsphere');
		$queryResult = odbc_exec($connection,$query);
		$bFoundUser = '0';
		logIt('bfoundUser='.$bFoundUser,'users','planezsphere');
		while($row = odbc_fetch_array($queryResult))
		{
			$trigger = $row['cnt'];		
			logIt('trigger='.$trigger);
			if ( $trigger > 0 )
			{
				$bFoundUser = '1';
			}	
		}
		
		logIt('bfoundUser='.$bFoundUser,'users','planezsphere');
		if ( $bFoundUser == '1')
		{
			logIt('return false','users','planezsphere');
			echo '{success:false}';					
		}
		else
		{
			logIt('return true','users','planezsphere');
			echo '{success:true}';	
		}
	}
	else 
	{
		//really do nothing
		echo '{success:true}';
	}
?>