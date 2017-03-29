<?php

/** ������� ����� �����������.*/
abstract class Controller_Base
{
    private $start_time;	// ����� ������ ��������� ��������

    /** �����������.*/
	function __construct()
	{
	   
	}
	
    /** ������ ��������� HTTP �������.*/
	public function Request()
	{
		$this->OnInput();
		$this->OnOutput();
	}
	
    /** ����������� ���������� �������.  */
	protected function OnInput()
	{
	   $this->start_time = microtime(true);
	}
	
	
    /** ����������� ��������� HTML.*/	
	protected function OnOutput()
	{
	   // �������� ������ ���� �������.		
		$page = $this->View('template.php', $this->content);
						
		// ����� ��������� �������.
        $time = microtime(true) - $this->start_time;        
        $page .= "<!-- ����� ��������� ��������: $time ���.-->";
        
		// ����� HTML.
        echo $page;
	   
	}
	

    /** ������ ���������� ������� GET?  */
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}


    /** ������ ���������� ������� POST?*/
	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}


    /** ��������� HTML ������� � ������.*/
	protected function View($fileName, $vars = array())
	{
		foreach ($vars as $k => $v) 
		$$k = $v;
	
		ob_start(); 
		include "view/$fileName"; 
		return ob_get_clean(); 	
	}	
}
