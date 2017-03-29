<?php

/** Контроллер страницы About.*/
class Controller_About extends Controller_Base
{	
    private $about;
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
	    $this->about = $this->View('about.php');
        $this->content = array('about' => $this->about);	
        parent::OnOutput();
	}
}
