<?php
	function get_form($msg='', $name='', $value='', $time='')
	{
		$t = '<div class="wrapper"><b>'.$msg.'</b><br/>';
		$t .= '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
		$t .= '<input type="text" name="name" value="'.$name.'" /><br/>';
		$t .= '<input type="text" name="value" value="'.$value.'" /><br/>';
		$t .= '<input type="text" name="time" value="'.$time.'" /><br/>';
		$t .= '<input type="submit" value="Set" /><br/>';
		foreach ($_COOKIE as $name => $value) 
		{
        	$t .= "<b>$name : $value </b><br>";
    	}
		$t .= '</form></div>';
		return $t;
	}

	if (!isset($_POST['name']))
	{
		echo get_form();
	}
	else
	{
		$name = $_POST['name'];
		$value = $_POST['value'];
		$time = time() + 200;
		setcookie($name, $value, $time);
		echo get_form('Куки установлен');
	}

	echo '<style>
		.wrapper{
			border: 1px solid silver;
			width: 400px;
			border-radius: 3px;
			background: #777;
		}
		input {
			margin-left: 5%;
			width: 90%;
			text-align: center;
		}
		b {
			margin-left: 5%;
			text-align: center;
		}
	</style>';

