<?php

/** Базовый класс контроллера.*/
abstract class Controller_Base
{
    private $start_time;	// время начала генерации страницы

    /** Конструктор.*/
	function __construct()
	{
	   
	}
	
    /** Полная обработка HTTP запроса.*/
	public function Request()
	{
		$this->OnInput();
		$this->OnOutput();
	}
	
    /** Виртуальный обработчик запроса.  */
	protected function OnInput()
	{
	   $this->start_time = microtime(true);
	}
	
	
    /** Виртуальный генератор HTML.*/	
	protected function OnOutput()
	{
	   // Основной шаблон всех страниц.		
		$page = $this->View('template.php', $this->content);
						
		// Время обработки запроса.
        $time = microtime(true) - $this->start_time;        
        $page .= "<!-- Время генерации страницы: $time сек.-->";
        
		// Вывод HTML.
        echo $page;
	   
	}
	

    /** Запрос произведен методом GET?  */
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}


    /** Запрос произведен методом POST?*/
	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}


    /** Генерация HTML шаблона в строку.*/
	protected function View($fileName, $vars = array())
	{
		foreach ($vars as $k => $v) 
		$$k = $v;
	
		ob_start(); 
		include "view/$fileName"; 
		return ob_get_clean(); 	
	}	
}
