<?php


class fechasemp {



public function cambiarfechasemp($fechae){
										
		



										$this->stmt = '';
											// fecha original en formato americano
											
											$fechas =$fechae;
											$fechafinalsoat = "";
		$mes = substr ( $fechas,  3 , 3 );	
		if($mes== "Jan" || $mes == "jan" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-01-".$dia;
						}
		if($mes== "Feb" || $mes == "feb" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-02-".$dia;
						}
		if($mes== "Mar" || $mes == "mar" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-03-".$dia;
						}
		if($mes== "Apr" || $mes == "apr" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-04-".$dia;
						}
		if($mes== "May" || $mes == "may" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-05-".$dia;
						}
		if($mes== "Jun" || $mes == "jun" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-06-".$dia;
						}
		if($mes== "Jul" || $mes == "jul" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-07-".$dia;
														}
		if($mes== "Aug" || $mes == "aug" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-08-".$dia;
						}
		if($mes== "Sep" || $mes == "sep" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-09-".$dia;
						}
		if($mes== "Oct" || $mes == "oct" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-10-".$dia;
						}
		if($mes== "Nov" || $mes == "nov" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-11-".$dia;
						}
		if($mes== "Dec" || $mes == "dec" ){
							$dia = substr ( $fechas ,  0 , 2 );
							$ano = substr ( $fechas ,  7 , 8 );
							$fechafinalsoat ="20".$ano."-12-".$dia;
						}
								
								$this->stmt =  $fechafinalsoat;
											return $this->stmt;
								
								}
 
 }
 ?>