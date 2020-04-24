<?php


class cadenas {

private $stmt = '';

public function puntuacion($cadena){
                                     $this->stmt = '';
									 $search = explode(",","แ,้,ํ,๓,๚,๑,ม,ษ,อ,ำ,ฺ,ั,รก,รฉ,รญ,รณ,รบ,รฑ,รรก,รรฉ,รรญ,รรณ,รรบ,รรฑ,๏ฟฝ,ร‘");
									 $replace = explode(",","แ,้,ํ,๓,๚,๑,ม,ษ,อ,ำ,ฺ,ั,แ,้,ํ,๓,๚,๑,ม,ษ,อ,ำ,ฺ,ั,ั,ั");
									 $this->stmt = str_replace($search, $replace, $cadena);
									 return $this->stmt;
								
								}
 
 }
 ?>