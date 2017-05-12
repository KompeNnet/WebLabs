<form action = "4_7.php" method = 'get'>
	<input type = 'text' name = 'mainText'>
	<button type = 'Submit'>Accept</button>
</form>

<?php
	function Coloring(&$result, $pointers)
	{
		for ($i = 0; $i < count($result); $i++)
		{
			if (preg_match("/^[a-z]+$/i", $result[$i]))
			{
				$result[$i] = "<span style = 'color: green'>" . $result[$i] . "</span>";
			} elseif (preg_match("/^[а-яр-ю]+$/i", $result[$i]))
				{
					$result[$i] = "<span style = 'color: blue'>" . $result[$i] . "</span>";
				} elseif (preg_match("/^[0-9]+$/i", $result[$i]))
					{
						$result[$i] = "<span style = 'color: red'>" . $result[$i] . "</span>";
					}
					elseif (strlen($result[$i]) > 1)
						{
							$temp = array();
							$fl = false;
							foreach ($pointers as $value)
							{
								$temp = explode($value, $result[$i]);
								if ($fl === false)
								{
									if (count($temp) > 1)
									{
										$fl = true;
										Coloring($temp, $pointers);
										$result[$i] = implode($value, $temp);
									}
								}
							}
							
						}
		}
	}

	if (isset($_GET['mainText']))
	{
		$mystr = $_GET['mainText'];
		$output="";
		$result = array();
		$result = explode(" ",$mystr);
		$pointers = Array (0 => ',', 1 => '.', 2 => ':');
		Coloring($result, $pointers);
		$output = implode(" ", $result);
		echo $output;
	}
?>	