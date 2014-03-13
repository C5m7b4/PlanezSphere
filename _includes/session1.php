<?php
	session_start();
	function redirect_to($location)
	{
		header("Location:".$location);
		exit();
	}
	$_SESSION['id']='21554';
	$_SESSION['name'] = 'Mike';
	redirect_to('session2.php');
?>