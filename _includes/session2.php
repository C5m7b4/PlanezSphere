<?php
	session_start();
	echo 'Hello '.$_SESSION['name'].'<br />';
	echo 'Your Id is '.$_SESSION['id'];
?>