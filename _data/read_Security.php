<?php
	require_once "../_includes/headers.php";
	
	$question = "select id,question from security order by id";
	$questionResult = odbc_exec($connection,$question);
	if ( $questionResult)
	{
		while($row = odbc_fetch_array($questionResult))
		{
			$myArray[] = array(
				'id'=>$row['id'],
				'question'=>$row['question']
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
				echo '{success:true,error:3,msg:No Questions returned,Error:516}';
			}
		}
		else
		{
			echo '{success:true,error:2,msg:No Questions returned,Error:515}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg:Error on Server:Error:514';
	}
?>