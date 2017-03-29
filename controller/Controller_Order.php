<?php

/** ���������� �������� ���������� ������.*/
class Controller_Order extends Controller_Base
{	
    private $orderform;
    public $content;
    
    
	/** �����������.*/
	function __construct()
	{
	   parent::__construct();
       session_start();
	}
	
	/** ����������� ���������� �������.*/
	protected function OnInput()
	{
        parent::OnInput();
        // ��������� �������� �����.
    	if (isset($_GET['act']))
    	{
            $act = $_GET['act'];
            if ($act == 'form')
            {
                $customer = session_id();
                $name = $_POST['name'];
                $secondname = $_POST['secondname'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $status = $_POST['status'];
                $date = $_POST['date'];
                $manager = new Model_Order;
                $custom = $manager->action_custom($customer,$name,$secondname,$email,$tel,$status,$date);
                if(!empty($custom))
                {
                    $this->send($name, $email);
                    
                    session_destroy();
                    header("Location: index.php?c=shop");
                    die();
 
                }
                else
                {
                    header("Location: index.php?c=basket");
                    die(); 
                }

            }
            
    	}
		else
		{
            
		}  	
	}
	
	/** ����� ���������� ������ ���������� */
    private function send ($name, $email) 
    {   
       $to = $email;
       $subject = '������������� �� ��������-�������� ���-��-��';
       $message = '������� '.$name. '�� ����������� ������� � �������.';
       $headers = 'From: support@tra-la-la.16mb.com' . "\r\n" ;
       mail($to, $subject, $message, $headers);
	}
    
    /** ����������� ��������� HTML.*/
	protected function OnOutput()
	{
        $this->orderform = $this->View('orderform.php');
        $this->content = array('orderform' => $this->orderform);	
        parent::OnOutput();
	}
}
