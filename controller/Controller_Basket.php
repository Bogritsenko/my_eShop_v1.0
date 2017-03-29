<?php

/** ���������� ������� ����������.*/
class Controller_Basket extends Controller_Base
{	
	private $select;
    private $basket;
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
           
           if($act == 'resave')
           {
                $customer = session_id();
                $manager = new Model_Basket;
                $action = $manager->action_resave($customer);
                if(!empty($action))
                {
                    $del= $manager->action_delete_basket($customer);
                    if($del)
                    {
                        header("Location: index.php?c=order");
                        die();
                    }
                    else
                    {
                        header("Location: index.php?c=basket");
                        die();
                    }
                }
                else
                {
                    header("Location: index.php?c=basket");
                    die();
                }	 
           }
           
           if($act == 'delete')
           {
                $id = $_GET['id'];
                $customer = session_id();
                $manager = new Model_Basket;
                $action = $manager->action_delete($id, $customer);
                header("Location: index.php?c=basket");
                die();
           }
          
    	}
		else
		{
	        $customer = session_id();
            //var_dump($customer);
            $manager = new Model_Basket;
            $this->select = $manager->action_select($customer);	
		} 	
	}
    
    /** ����� ��������� ����� � ������� */
    public function Add($id)
    {
        $goodsid = $id;
        $customer = session_id();
        $quantity = 1;
        $manager = new Model_Basket;
        $action = $manager->action_add($customer, $goodsid, $quantity);
        if($action)
        {
            return 1;
        }
        else
        {
            return 0;
            
        }
        
    }
    
    /** ����� �������� ��������� ������������ ������ � �������
        � ������� ����� ����� ���� �������*/
    public function Update($id, $quantity)
    {
        $goodsid = $id;
        $customer = session_id();
        $manager = new Model_Basket;
        $action = $manager->action_update($customer, $goodsid, $quantity);
        return $action; 
    }
    

	/** ����������� ��������� HTML.*/
	protected function OnOutput()
	{
        $vars = array ('select' => $this->select);
        $this->basket = $this->View('basket.php', $vars);
        $this->content = array('basket' => $this->basket);		
        parent::OnOutput();
	}
}
