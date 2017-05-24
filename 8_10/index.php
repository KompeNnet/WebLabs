<form method="post">
	<input type="text" name="text"/>
	<img src="">
	<select name="mail">
		<option>kompennet@gmail.com</option>
		<option>motterante@gmail.com</option>
	</select>
	<input type="text" name="captcha"/>
	<button name="submit">Submit</button>
</form>

<?php
	if ((isset($_POST["text"]))(isset($_POST["captcha"])))
	{
		if ($_POST["captcha"] == 1234)
		{
			$to = $_POST["mail"];
			if (mail($mail, subject, message)) echo "Got it!";
		}
	}
?>