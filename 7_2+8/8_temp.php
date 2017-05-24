<?php
	session_start();
    $uri = (string)($_SERVER['REQUEST_URI']);
	if (isset($_SESSION['time']))
	{
        $_SESSION['time'][] = array($uri, date('r', time()));
	} 
	else 
	{
        $_SESSION['time'] = array();
        $_SESSION['time'][] = array($uri, date('r', time()));
	}
	foreach ($_SESSION['time'] as $time)
	{
        echo $time[0] . ' | ' . $time[1] . "<br/>";
	}
?>