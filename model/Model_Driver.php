<?php

/** ������� �������� ������ � ��*/
class Model_Driver
{
    private static $instance; 	// ������ �� ��������� ������ 
	private $host;// ��������� ����������� � ��.
    private $name;
    private $user;
    private $pass;
    
    /** �����������*/
   function __construct()
   {
      $this->host  = 'localhost';
      $this->name  = 'e-shop';
      $this->user  = 'coder';
      $this->pass  = 'coder';
      
      setlocale(LC_ALL, 'ru_RU.CP1251');
      mysql_connect($this->host, $this->user, $this->pass) or die(mysql_error());
      mysql_query('SET NAMES cp1251');
      mysql_select_db($this->name) or die(mysql_error());    
  }
    
    
	/** ��������� ������������� ���������� (��������)*/
	
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new Model_Driver();
		
		return self::$instance;
	}
	
    
	 /** ������� �����
	 $query    	- ������ ����� SQL �������
	 ���������	- ������ ��������� ��������*/
	
	public function Select($query)
	{
		$result = mysql_query($query);
		
		if (!$result)
			die(mysql_error());
		
		$n = mysql_num_rows($result);
		$arr = array();
	
		for($i = 0; $i < $n; $i++)
		{
			$row = mysql_fetch_assoc($result);		
			$arr[] = $row;
		}

		return $arr;				
	}
	
	
	 /** ������� ������
	 $table 		- ��� �������
	 $object 		- ������������� ������ � ������ ���� "��� ������� - ��������"
	 ���������	- ������������� ����� ������*/
	
	public function Insert($table, $object)
	{			
		$columns = array();
		$values = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysql_real_escape_string($key . '');
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else
			{
				$value = mysql_real_escape_string($value . '');							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = mysql_query($query);
								
		if (!$result)
			die(mysql_error());
			
		return mysql_insert_id();
	}
	
	
	 /** ��������� �����
	 $table 		- ��� �������
	 $object 		- ������������� ������ � ������ ���� "��� ������� - ��������"
	 $where		- ������� (����� SQL �������)
	 ���������	- ����� ���������� �����*/
		
	public function Update($table, $object, $where)
	{
		$sets = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysql_real_escape_string($key . '');
			
			if ($value === null)
			{
				$sets[] = "$key=NULL";			
			}
			else
			{
				$value = mysql_real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}			
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = mysql_query($query);
		
		if (!$result)
			die(mysql_error());

		return mysql_affected_rows();	
	}
	
	
	 /** �������� �����
	 $table 		- ��� �������
	 $where		- ������� (����� SQL �������)	
	 ���������	- ����� ��������� ����� */
			
	public function Delete($table, $where)
	{
		$query = "DELETE FROM $table WHERE $where";		
		$result = mysql_query($query);
						
		if (!$result)
			die(mysql_error());

		return mysql_affected_rows();	
	}
}
