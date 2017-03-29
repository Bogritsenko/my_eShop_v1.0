<?php

/** ���������� ������� �������� �����.*/
class Controller_Main extends Controller_Base
{	
	private $start_time;	// ����� ������ ��������� ��������
	/** �����������.*/
	function __construct()
	{
	
	}
	
	/** ����������� ���������� �������.*/
	protected function OnInput()
	{
	   $this->start_time = microtime(true);
		
	}
	
	/** ����������� ��������� HTML.*/
	protected function OnOutput()
	{
	    
		$page = $this->View('main.php');
						
		// ����� ��������� �������.
        $time = microtime(true) - $this->start_time;        
        $page .= "<!-- ����� ��������� ��������: $time ���.-->";
        
		// ����� HTML.
        echo $page;
	}
}
