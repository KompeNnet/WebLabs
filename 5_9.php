<?php
	header('Content-Type: text/html; charset = utf-8');
	$row = array();
	$comand = $_POST['start'];
	$mysqli = new mysqli('localhost', 'root', '', 'mainusers');
	$db='mainusers';
	if ($mysqli->connect_error)
	{
		die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	else
	{
		if ($comand != '')
		{
			echo $comand . "<br>";
			$mysqli->query('SET names "utf8"');
			$mtime = microtime();
			$mtime = explode(" ", $mtime);
			$mtime = $mtime[1] + $mtime[0];
			$tstart = $mtime; 
			$resultMySQL = $mysqli->query($comand);
			if (!$resultMySQL)
			{
				echo "oups, error in command!";
			}
			else
			{
			if ($resultMySQL == true)
				{
					$resultMySQL = $mysqli->query($comand);
					$pos = strpos('1' . $comand, 'SELECT');
					if ($pos != 0)
					{
						while ($row = $resultMySQL->fetch_array(MYSQLI_ASSOC)) $result = $row;
						if (isset($result)) print_r($result); else echo "no result found";
						echo "<br>";
					}
					echo "Command execute<br>";
				}
				$mtime = microtime();
				$mtime = explode(" ", $mtime);
				$mtime = $mtime[1] + $mtime[0];
				$tend = $mtime;
				$tpassed = ($tend - $tstart);
				echo 'Памяти использовано: ', round(memory_get_usage()/1024/1024,4), ' MB<br>';
				echo "Время выполнения " . round($tpassed,6) . "<br>";
			}
		}
	}
?>
<form action = '' method = 'post'>
		<p> Insert code </p>
	<input type = 'text' name = 'start'>
</form>
