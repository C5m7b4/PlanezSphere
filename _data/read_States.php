<?php
	require_once "../_includes/headers.php";
		
	$states = "select name,abbr from states_tab order by abbr";
	logIt($states,'states_tab','planezsphere');
	
	$stateResults = odbc_exec($connection,$states);
	if ( $stateResults)
	{
		while($row = odbc_fetch_array($stateResults))
		{
			$myArray[] = array(
				'name'=>$row['name'],
				'abbr'=>$row['abbr']
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
				echo '{success:true,error:3,msg:Empty Array returned}';
			}
		}
		else
		{
			echo '{success:true,error:2,msg:No Results returned}';
		}
	}
	else
	{
		echo '{success:true,error:1,msg:Internal Error:525}';
	}
?>