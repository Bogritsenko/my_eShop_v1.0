<?php

/** Контроллер страницы для менеджеров по продаже.*/
class Controller_Service extends Controller_Base
{	
    private $service;
    private $select;
    public $content;
    
    
	/** Конструктор.*/
	function __construct()
	{
	   parent::__construct();
	}
	
	/** Виртуальный обработчик запроса.*/
	protected function OnInput()
	{
        parent::OnInput();	
	}
	
	/** Виртуальный генератор HTML.*/
	protected function OnOutput()
	{
        $this->service = $this->View('service.php');
        $this->content = array('service' => $this->service);	
        parent::OnOutput();
	}
}
