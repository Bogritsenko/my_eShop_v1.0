<?php
/** �������� ��� ������ � ����������� ������� */
class Model_Category
{
    private $action;// ������ �� �������
    
    /** �����������*/
    public function __construct()
    {
        
    }
    
    /** ����� ������� ����� ���������*/
    public function action_create($name)
    {
        //�������� ���� ����� ��������� ��� �� �� ������� ����� ��
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
    
    /** ����� ������� ���������*/
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
    
    /** ����� �������� ��� ��������*/
    public function action_select()
    {
        $t = "SELECT * FROM category ";
		$result = $this->action->Select($t);
        return $result;
        
    }
    
    /** ����� ��������� �������� ���������*/
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
    
    /** ����������*/
    public function __destruct()
    {
        
    }
	
}
