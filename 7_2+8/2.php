<?
	//Запуск сессии
	session_start();
	//Если в сессии есть ключ pages, можно с ним работать
	if (isset($_SESSION['time']))
	{
        $_SESSION['time'][] = array($_SERVER['REMOTE_ADDR'] ,date('c', time()));
		//Если ключа pages нет, его надо создать как массив
	} else 
	{
        $_SESSION['time'] = array();
        $_SESSION['time'][] = array($_SERVER['REMOTE_ADDR'] ,date('c', time()));
	}
	foreach ($_SESSION['time'] as $time)
	{
        echo $time[0] . ' | ' . $time[1];
	}
?>