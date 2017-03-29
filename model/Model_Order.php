<?php
/** Менеджер для работы с заказами и покупателями */
class Model_Order
{
    private $action;// ссылка на драйвер
    
    /** Конструктор*/
    public function __construct()
    {
        $this->action = Model_Driver::Instance();
        
    }
    
    /** метод сохраняет данные покупателей в базе данных
     и сохраняет за покупателем его заказ*/
    public function action_custom($customer,$name,$secondname,$email,$tel,$status,$date)
    {
        $t = "SELECT id_order FROM orders WHERE customer='%s'";
        $query = sprintf($t, mysql_real_escape_string($customer));
        $result = $this->action->Select($query);
        
        $object = array();
        $object['name'] = $name;
        $object['secondname'] = $secondname;
        $object['email'] = $email;
        $object['tel'] = $tel;
        $object['status'] = $status;
        $object['date'] = $date;
        $id_custom = $this->action->Insert('custom', $object);
        
        foreach($result as $key=>$value)
        {
            $object = array();
            $object['id_order'] = $value['id_order'];
            $object['id_custom'] = $id_custom;
            $arr = $this->action->Insert('ordetToCustom', $object);
            $array[] = $arr;
        }
        return $array;            	    
	}
    
    /** метод возврощает информацию о заказах*/
    public function action_orders()
    {
        $t = "SELECT custom.name, custom.tel, 
                (orders.price*orders.quantity) AS sum, custom.status, custom.date
                FROM custom, orders
                WHERE custom.id_custom
                IN (SELECT id_custom
                FROM ordettocustom
                WHERE TYPE='0')";
        $result = $this->action->Select($t);
		return $result;  
    	    
	}
    
    /** метод отмечает обработанные заказы*/
    public function action_type($id_order)
    {
		
        $object = array();
        $object['type'] = '1'; 
		$t = "id_order = '%d'";
		$where = sprintf($t,$sid);
		$affected_rows = $this->action->Update('ordettocustom', $object, $where);

		if ($affected_rows == 0)
		{
			return false;			
		}
        else
        {
           return true; 
        }	       			
   	    
	}
    
         
    /** Деструктор*/
    public function __destruct()
    {
        
    }
	
}
