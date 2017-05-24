<?php
	if (!isset($_COOKIE["date"]))
	{
		$arr = array();
		$arr[] = time();
		$str = implode(" | ", $arr);
		setcookie("date", $str, 60 * 60 * 60 * 24 * 3);
	}
	else
	{
		$str = $_COOKIE["date"];
		$arr = explode(" | ", $str);
		$arr[count($arr)] = time();
		for ($i = 0; $i < count($arr); $i++)
		{
			echo $arr[i];
		}
		setcookie("date", $arr, 60 * 60 * 60 * 24 * 3);
	}
?>