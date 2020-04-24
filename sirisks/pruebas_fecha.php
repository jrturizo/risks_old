<?php
$fecha = '2020-03-14';
$nuevafecha = strtotime ( '+2 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
echo $nuevafecha;

?>