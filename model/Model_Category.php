<?php
/** ћенеджер дл€ работы с категори€ми товаров */
class Model_Category
{
    private $action;// ссылка на драйвер
    
    /**  онструктор*/
    public function __construct()
    {
        
    }
    
    /** метод создает новую категорию*/
    public function action_create($name)
    {
        //проверка есть така€ категори€ что бы не создать такую же
        $t = "SELECT id_cat FROM category WHERE name = '%s'";
		$query = sprintf($t, mysql_real_escape_string($name));
		$result = $this->action->Select($query);

        if(empty($result))
        {
            $object = array();
            $object['name'] = $name;
            $this->action->Insert('category', $object);
            return true;   
        }
        else
        {
            return false;   
        } 
		
        
    }
    
    /** метод удал€ет категорию*/
    public function action_delete($name)
    {
        $t = "name = '%s'";
        $where = sprintf($t, $name);
		$result = $this->action->Delete('category', $where);
        
        if($result == 0)
        {
            return false; 
        }
        else
        {
            return true; 
        }
        
    }
    
    /** метод выбирает все категори*/
    public function action_select()
    {
        $t = "SELECT * FROM category ";
		$result = $this->action->Select($t);
        return $result;
        
    }
    
    /** метод обновл€ет название категории*/
    public function action_update($name, $named)
    {
        $object = array();
		$object['name'] = $name; 			
		$t = "name = '%s'";
		$where = sprintf($t, mysql_real_escape_string($named));
		$affected_rows = $this->action->Update('category', $object, $where);
        
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
