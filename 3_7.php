<!DOCTYPE html>
<html>
	<head>
		<title>Graphic</title>
	</head>
	<body>
		<form action="3_7.php" method="POST">
		<h1 style="font-family:arial; color:white;font-size:30px;">
			Path: <input type="text" name="path">
			<input type="submit" value="submit">
        <h1/>
		</form>

		<?php
			function Calculate($path, $sizes)
			{
				$graphics = Array (0 => '.bmp', 1 => '.gif', 2 => '.svg', 3 => '.jpeg', 4 => '.jpg', 5 => '.jpe', 6 => '.jp2', 7 => '.png', 8 => '.wmf',
								9 => '.raw', 10 => '.tif', 11 => '.tiff', 12 => '.wdp');
				if (Research($path, $sizes, $graphics) === false)
					return "Invalid directory.";
				return round($sizes[0]/$sizes[1], 2);
			}
		
			function Research($path, &$sizes, $graphics) 
			{
				if (!(is_dir($path)))
				{
					return false;
				}
				$files = scandir($path);
				for ($i = 0; $i < count($files); $i++)
				{
					if ((strcmp($files[$i], ".") != 0) && (strcmp($files[$i], "..") != 0))
					{	
						if (is_file($path . "\\" . $files[$i]) === true)
						{
							$sizes[1] += filesize($path . "\\" . $files[$i]);
							$fl = false;
							for ($j = 0; $j < count($graphics); $j++)
							{
								if ((strpos($files[$i], $graphics[$j]) !== false) && (!$fl))
								{
									$sizes[0] += filesize($path . "\\" . $files[$i]);
									$fl = true;
								}
							}
						}
						else
						{
							Research($path . "\\" . $files[$i], $sizes, $graphics);
						}
					}
				}
			}
		
			if (isset($_POST['path'])) 
			{
				$path = $_POST['path'];	
				$sizes = Array( 0 => 0, 1 => 0);
				echo "Result: " . Calculate($path, $sizes);
			}
		?>

	</body>
</html>