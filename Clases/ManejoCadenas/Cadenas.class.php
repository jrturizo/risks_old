<?php


class cadenas {

private $stmt = '';

public function puntuacion($cadena){
                                     $this->stmt = '';
									 $search = explode(",","�,�,�,�,�,�,�,�,�,�,�,�,á,é,í,ó,ú,ñ,�á,�é,�í,�ó,�ú,�ñ,�,Ñ");
									 $replace = explode(",","�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�,�");
									 $this->stmt = str_replace($search, $replace, $cadena);
									 return $this->stmt;
								
								}
 
 }
 ?>