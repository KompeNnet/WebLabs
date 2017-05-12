<?php
	include 'functions.php';
	$info = GetMainInfo();
	if ($info == NULL)
	{
		echo 'Connection error.';
	}
	else
	{
		include 'Templator.php';

		$day1 = new QTemplate('currDay');
		$tempDay1 = $day1->assignVars(array('date'=>date("d.m.y", GetDayDate($info, 0)) . "<br/>", 'info'=>GetDayInfo($info, 0), 'icon'=>GetSkyIcon($info, 0)));
		$day2 = new QTemplate('currDay');
		$tempDay2 = $day2->assignVars(array('date'=>date("d.m.y", GetDayDate($info, 1)) . "<br/>", 'info'=>GetDayInfo($info, 1), 'icon'=>GetSkyIcon($info, 1)));
		$day3 = new QTemplate('currDay');
		$tempDay3 = $day3->assignVars(array('date'=>date("d.m.y", GetDayDate($info, 2)) . "<br/>", 'info'=>GetDayInfo($info, 2), 'icon'=>GetSkyIcon($info, 2)));

		$block = new QTemplate('mainBlock');
		$tempBlock = $block->assignVars(array('day1'=>($day1->render()), 'day2'=>($day2->render()), 'day3'=>($day3->render())));

		$resBlock = new QTemplate('main');
		$resBlock->assignVars(array('mainBlock'=>($block->render()), 'header'=>'Weather'));
		echo $resBlock->render();
	}
?>