<?php

/** ���������� �������� About.*/
class Controller_About extends Controller_Base
{	
    private $about;
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
	    $this->about = $this->View('about.php');
        $this->content = array('about' => $this->about);	
        parent::OnOutput();
	}
}
