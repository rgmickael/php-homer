<?php

namespace Components;

class Template
{
	public static $viewPath = __DIR__.'/../templates';
	private $name;

	public function __construct(string $name)
	{
		$this->name=$name;
	}

	private function getFilePath():string
	{
		return self::$viewPath.DIRECTORY_SEPARATOR.$this->name.'.php';
	}

	public function render(array $data=[]):string
	{
		extract($data, EXTR_OVERWRITE);
		ob_start();
		require $this->getFilePath();
		$rendered=ob_get_clean();
		return (string) $rendered;
	}
}