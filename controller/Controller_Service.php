<?php

/** ���������� �������� ��� ���������� �� �������.*/
class Controller_Service extends Controller_Base
{	
    private $service;
    private $select;
    public $content;
    
    
	/** �����������.*/
	function __construct()
	{
	   parent::__construct();
	}
	
	/** ����������� ���������� �������.*/
	protected function OnInput()
	{
        parent::OnInput();	
	}
	
	/** ����������� ��������� HTML.*/
	protected function OnOutput()
	{
        $this->service = $this->View('service.php');
        $this->content = array('service' => $this->service);	
        parent::OnOutput();
	}
}
