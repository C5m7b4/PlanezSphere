<?php
	session_start();
	echo 'Hello '.$_SESSION['userid'].'<br />';
	echo 'Your Id is '.$_SESSION['id'];
?>