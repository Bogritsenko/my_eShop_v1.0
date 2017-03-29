<?php

/** Контроллер главной страницы сайта.*/
class Controller_Main extends Controller_Base
{	
	private $start_time;	// время начала генерации страницы
	/** Конструктор.*/
	function __construct()
	{
	
	}
	
	/** Виртуальный обработчик запроса.*/
	protected function OnInput()
	{
	   $this->start_time = microtime(true);
		
	}
	
	/** Виртуальный генератор HTML.*/
	protected function OnOutput()
	{
	    
		$page = $this->View('main.php');
						
		// Время обработки запроса.
        $time = microtime(true) - $this->start_time;        
        $page .= "<!-- Время генерации страницы: $time сек.-->";
        
		// Вывод HTML.
        echo $page;
	}
}
