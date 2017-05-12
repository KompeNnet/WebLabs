<?php
class QTemplate
{
	private $content = NULL;
	private $resContent = NULL;

	function __construct($html_name)
	{
		if (!file_exists($html_name . '.html'))
		{
			return;
		}
		$this->content = file_get_contents($html_name . '.html');
	}

	function assignVars($vars)
	{
		$this->resContent = $this->content;
		foreach ($vars as $blockname => $value) 
		{
			$this->resContent = preg_replace('/{' . $blockname . '}/i', $value, $this->resContent);			
		}
	}

	function render()
	{
		if ($this->resContent == '') $this->resContent = $this->content;
		return $this->resContent;
	}
}
?>