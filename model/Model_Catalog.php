<?php
/** ћенеджер дл€ работы с каталогом товаров */
class Model_Catalog
{
    private $action;// ссылка на драйвер
    
    /**  онструктор*/
    public function __construct()
    {
        $this->action = Model_Driver::Instance();
        
    }
    
    /** метод добавл€ет новый товар в католог*/
    public function action_create($id_cat, $name, $price)
    {
        //проверка есть такой товар,что бы не создать такой же
        $t = "SELECT id FROM catalog WHERE name = '%s' AND id_cat = '%d'";
		$query = sprintf($t, mysql_real_escape_string($name), $id_cat);
		$result = $this->action->Select($query);
        
        if(empty($result))
        {
            $object = array();
            $object['id_cat'] = $id_cat;
            $object['name'] = $name;
            $object['price'] = $price;
            $this->action->Insert('catalog', $object);
            return true;   
        }
        else
        {
            return false;   
        } 
		
        
    }
    
    /** метод удал€ет товар из каталога*/
    public function action_delete($id)
    {
        $t = "id = '%d'";
        $where = sprintf($t, $id);
		$result = $this->action->Delete('catalog', $where);
        
        if($result == 0)
        {
            return false; 
        }
        else
        {
            return true; 
        }
        
    }
        
    /** метод выбируат все товары или товары одной категории из каталога*/
    public function action_select($id_cat)
    {
        if($id_cat == 0)
        {
            $t = "SELECT * FROM catalog ORDER BY id_cat ASC";
    		$result = $this->action->Select($t);
            return $result;            
        }
        else
        {
            $t = "SELECT * FROM catalog WHERE id_cat = '%d' ORDER BY id ASC";
            $query = sprintf($t, $id_cat);
    		$result = $this->action->Select($query);
            return $result;           
        }
          
    }
    
    /** метод обновл€ет информацию о товаре*/
    public function action_update($id, $object)
    {		
		
        $t = " id = '%d' ";
		$where = sprintf($t, $id);
		$affected_rows = $this->action->Update('catalog', $object, $where);
        
        if ($affected_rows == 0)
		{
			return false;			
		}
        else
        {
            return true;
        }
        
    }
    
    /** ƒеструктор*/
    public function __destruct()
    {
        
    }
	
}
