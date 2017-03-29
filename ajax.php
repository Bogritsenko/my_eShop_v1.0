<?php
/** модуль который поддержитвает клиентские фукции 
    реализованные на js*/
include_once('Controller/Controller_Basket.php');
include_once('Model/Model_Basket.php');
include_once('Model/Model_Driver.php');
// Получаем данные
if (isset($_POST['id']) && isset($_POST['quantity']))
{
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $manager = new Controller_Basket;
    $result = $manager->Update($id, $quantity);
    if (!$result)
    {
        $allsum = 0; 
    }
    else
    {
        $allsum = '';
        foreach ($result as $value)
        {
            $allsum += $value['sum'];   
        }
    }
    
    $response = 
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' .
            '<response>' .
                '<allsum>' .
                    $allsum .
                '</allsum>' .
            '</response>'; 
    if(ob_get_length()) ob_clean();
    header('Content-Type: text/xml');
    echo $response;
     
} 
elseif(isset($_POST['id']))
{
    $id = $_POST['id'];
    $manager = new Controller_Basket;
    $result = $manager ->Add($id);
    
    if ($result)
    {
        $status = 1;
    }
    else
    {
        $status = 0;
    }
    
    $response = 
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' .
            '<response>' .
                '<status>' .
                    $status .
                '</status>' .
            '</response>'; 
    if(ob_get_length()) ob_clean();
    header('Content-Type: text/xml');
    echo $response;  
}
else
{
    
}

?>