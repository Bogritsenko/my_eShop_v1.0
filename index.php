<?php
/** Единая точка входа на сайт, 
   контроллер выбираеться по параметру вызова */
include_once ('model/startup.php');

function __autoload($className) 
{ 
    $pos = strpos($className, "_");
    $dir = substr($className, 0, $pos); //название папки где искать файл 
    //объявления классов в соответствующих файлах 
    include_once($dir.'/'.$className.'.php');
}

if (isset($_GET['c']))
{
    // Выбор контроллера.
    switch ($_GET['c'])
    {
    case 'shop':
    	$controller = new Controller_Shop();
    	break;
    case 'basket':
    	$controller = new Controller_Basket();
    	break;
    case 'order':
    	$controller = new Controller_Order();
    	break;            
    case 'about':
    	$controller = new Controller_About();
    	break;
    case 'service':
    	$controller = new Controller_Service();
    	break;           
    default:
    	
    }
}
else
{
    $controller = new Controller_Main();    
}

// Обработка запроса.
$controller->Request();
