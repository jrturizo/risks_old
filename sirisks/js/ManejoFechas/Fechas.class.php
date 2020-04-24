<?php


class fechas {



public function cambiarfechas($fecha){
											$this->stmt = '';
											// fecha original en formato americano
											$fechaf = $fecha;
											$dia = substr($fechaf, 0, 2);
											$mes   = substr($fechaf, 3, 2);
											$ano = substr($fechaf, -4);
											// fechal final realizada el cambio de formato a las fechas europeas
											$fechac = $ano . '-' . $mes . '-' . $dia;
											$this->stmt =  $fechac;
											return $this->stmt;
								
								}
 
 }
 ?>