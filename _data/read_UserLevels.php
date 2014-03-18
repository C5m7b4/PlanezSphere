<?php
	require_once "../_includes/headers.php";
	$levels = "select id,description,level from levels order by level";
	logIt($levels,'levels');
	$levelsResult = odbc_exec($connection,$levels);
	if ( $levelsResult)
	{
		while ($row = odbc_fetch_array($levelsResult))
		{
			$myArray[] = array(
				'id'=>$row['id'],
				'description'=>$row['description'],
				'level'=>$row['level']
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
				echo '{success:true,error:3,msg:No data Returned,Error:531}';	
			}
		}
		else
		{
			echo '{success:true,error:2,msg:No data Returned,Error:532}';	
		}
	}
	else
	{
		echo '{success:true,error:1,msg:No data Returned,Error:533}';	
	}
?>