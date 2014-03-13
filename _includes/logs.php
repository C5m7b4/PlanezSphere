<?php

	require_once("dbConnection.php");
	
	date_default_timezone_set('America/Chicago');
	
	function logIt($msg,$table="",$application="" )
	{
		global $connection;
		$cleanedMsg = remove_single_quotes($msg);
		$userID = "0";
		if ( isset($_SESSION['USERID']))
		{
			$userID = $_SESSION['USERID'];
		}
		
		
		$postDate = addHoursToTime(0);
		$query = "insert into logs (message, userid, postDate, sqltable,application) values ('{$cleanedMsg}',{$userID},'{$postDate}','{$table}','{$application}')";
		odbc_exec($connection,$query);// or die ('Log insert failed. ' . mysql_error());
	}
	
	function remove_single_quotes($query)
	{
		$cleanedQuery = str_replace("'", "|", $query);
		return $cleanedQuery;
	}
	
	function addHoursToTime($diff)
	{
		$submitDate = time();
		$odbc_datetime = strftime("%Y-%m-%d %H:%M:%S", $submitDate);
		//this will be the current time if the timezone is setup for america/chicago in the php.ini file
		//echo $odbc_datetime . "<br />";
		//now we can modify the time by just passing in -1 hours or +2 days and other shit like that
		//pain in the ass if you ask me but what the fuck
		$hourBack = strtotime($odbc_datetime . " " . $diff . " hours");
		$nd = strftime("%Y-%m-%d %I:%M:%S %p", $hourBack);
		return $nd;
	}
	
	function redirect_to($location = NULL)
	{
		if ( $location != NULL )
		{
			header("Location:{$location}");
			exit;
		}
	}
	
	function sql_make_string($sin)
	{
		//$v1 = str_replace("'", "''", $sin);
		$v2 = str_replace("[", "", $sin);
		$v3 = str_replace("]", "", $v2);
		$v4 = str_replace("\\", "", $v3);
		return $v4;
	}
	
	function cleanseSql($input)
	{
		$pattern = '/-/';
		$pattern1 = '/\'/';
		$new_string = preg_replace($pattern,"",$input);
		$new_string = preg_replace($pattern1,"",$new_string);
		$new_string = utf8_encode($new_string);
		$new_string = str_replace("'", "^", $new_string);
		$new_string = str_replace("--", "&&", $new_string);
		return $new_string;
	}
	
	function getColumnName($value)
	{
		global $connection;
		$col = "select columnname from multi_search_types where description='{$value}'";
		logIt($col,'multi_search_types');
		$colResults = odbc_exec($connection,$col);
		if ( $colResults)
		{
			$result = '';
			while($row = odbc_fetch_array($colResults))
			{
				$result=$row['columnname'];
			}
			return $result;
		}
		else
		{
			return 'no value';	
		}
	}	
	
	function report($msg)
	{
		echo $msg.'<br />';	
	}

?>