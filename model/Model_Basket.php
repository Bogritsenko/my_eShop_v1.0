<?php
/** �������� ��� ������ � �������� ���������� */
class Model_Basket
{
    private $action;// ������ �� �������
    
    /** �����������*/
    public function __construct()
    {
        $this->action = Model_Driver::Instance();
        
    }
    
    /** ����� ��������� ����� ����� � �������
        � ���������� ������������� ����� ������*/
    public function action_add($customer, $goodsid, $quantity)
    {
        $object = array();
        $object['customer'] = $customer;
        $object['goodsid'] = $goodsid;
        $object['quantity'] = $quantity;
        $result = $this->action->Insert('basket', $object);
        return $result;         
    }
    
    /** ����� �������� ��������� ������������ ������ � �������
    � ������� ����� ����� ������*/
    public function action_update($customer, $goodsid, $quantity)
    {
        $object = array();
        $object['quantity'] = $quantity; 
		$t = "customer = '%s' AND goodsid = '%d'";
		$where = sprintf($t, mysql_real_escape_string($customer), $goodsid);
		$affected_rows = $this->action->Update(' basket', $object, $where);

		if ($affected_rows == 0)
		{
			return false;			
		}
        else
        {
           $t = "SELECT (basket.quantity * catalog.price) AS sum
                FROM basket
                JOIN catalog
                ON basket.goodsid = catalog.id
                WHERE basket.customer='%s' ";
            $query = sprintf($t, mysql_real_escape_string($customer));
            $result = $this->action->Select($query);
    		return $result;
        }	       			
   	    
	}
    
    /** ����� ������� ����� �� �������*/
    public function action_delete($id, $customer)
    {
        $t = " goodsid = '%d' and customer = '%s'";
        $where = sprintf($t, $id, mysql_real_escape_string($customer));
		$result = $this->action->Delete('basket', $where);
        
        if($result == 0)
        {
            return false; 
        }
        else
        {
            return true; 
        }
        
    }
        
    /** ����� ������� ������� ������������*/
    public function action_select($customer)
    {
        $t = "SELECT catalog.id, catalog.name, catalog.price, basket.quantity,
            (catalog.price * basket.quantity) AS sum
             FROM catalog, basket 
			 WHERE customer='%s' 
			 AND catalog.id=basket.goodsid";
        $query = sprintf($t, mysql_real_escape_string($customer));
        $result = $this->action->Select($query);
		return $result;  
    }
    
    /** ����� ������������� ������ �� ������� � ������*/
    public function action_resave($customer)
    {
		$goods = $this->action_select($customer);
		foreach ($goods as $good) 
        {
            $object = array();
            $object['name'] = $good["name"];
            $object['price'] = $good["price"];
            $object['customer'] = $customer;
            $object['quantity'] = $good["quantity"];
            $result = $this->action->Insert('orders', $object);
            $arr[] =  $result;       			
		}
        return $arr;
            	    
	}

    /** ����� ������� ������� ����������*/
    public function action_delete_basket($customer)
    {
        $t = " customer = '%s' ";
        $where = sprintf($t, mysql_real_escape_string($customer));
		$result = $this->action->Delete('basket', $where);
        
        if($result == 0)
        {
            return false; 
        }
        else
        {
            return true; 
        }
        
    }
       
    /** ����������*/
    public function __destruct()
    {
        
    }
	
}
