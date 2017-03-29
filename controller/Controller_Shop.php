<?php

/** Контроллер торгового зала магазина.*/
class Controller_Shop extends Controller_Base
{	
	private $select;
    private $shopping_cart;
    private $shelf;
    private $form;
    public $content;
    
    
	/** Конструктор.*/
	function __construct()
	{
	   parent::__construct();
	}
	
	/** Виртуальный обработчик запроса.*/
	protected function OnInput()
	{
        parent::OnInput();
        // Обработка отправки формы.
    	if (isset($_GET['sel']))
    	{
            $category = $_POST['cat'];
            $catalog = new Model_Catalog;
            $this->select = $catalog->action_select($category);
    	}
		else
		{
	        $category = 0;
            $catalog = new Model_Catalog;
            $this->select = $catalog->action_select($category);	
		}  	
	}
	
	/** Виртуальный генератор HTML.*/
	protected function OnOutput()
	{
	    $this->form = $this->View('form.php');
        $vars = array ('select' => $this->select);
        $this->shelf = $this->View('shelf.php', $vars);
        $this->shopping_cart = $this->View('shopping_cart.php');
        $this->content = array('shopping_cart' => $this->shopping_cart,
                                    'shelf' => $this->shelf,
                                     'form' => $this->form);	
        parent::OnOutput();
	}
}
