<?php 
	require_once("logs.php");
	session_start();
	
	function logged_in()
	{
		if ( isset($_SESSION['ID']))
		{
			return true;	
		}
		else
		{
			logIt('Invalid Session found','planezshpere');
			return false;
		}
		return isset($_SESSION['ID']);
	}
	
	function confirm_logged_in()
	{
		if ( !logged_in())
		{
			redirect_to("index.php");
		}
	}
?>