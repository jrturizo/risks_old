<?php 

function dameFecha($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));        
}


  
 //Sumar 364 dias
echo dameFecha($_POST['fecha'],$_POST['dias']);


?>