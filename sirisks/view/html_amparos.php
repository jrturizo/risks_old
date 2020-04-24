<?php 
	session_start();
	$usuario = $_SESSION['Id'];
    require '../../Clases/Db.class.php';
    require '../../Clases/Conf.class.php';
    $bd=Db::getInstance();
	
	$contador = 0;
	//Consulto el Id de la compañia sociado a la Poliza del vehiculo
		$sql = "SELECT `id`, `nombre` FROM `amparosafectados` WHERE Estado = 'A' AND `idramo` = '".$_GET['idRamo']."' ORDER BY `amparosafectados`.`nombre` ASC";
		$stmt=$bd->ejecutar($sql);	
		while($rowcc=$bd->obtener_fila($stmt,0))
		{
			
				$cheked="";
				$required="";
				$valor = 'N';
			
			$menu .= '<td>
							<div class="form-group">															
								<div class="checkbox">
									<label class="text-bold">
										<input type="hidden" id="valAmp'.$contador.'" name="valAmp['.$contador.']" value="'.htmlentities($rowcc['id']).'"/>
										<input type="checkbox" class="styled check_amparo" id="amp'.$contador.'" name="amp['.$contador.']" value="N"  >
										'.htmlentities($rowcc['nombre']).'
									</label>
								</div>											
							</div>             
						</td>
						<td>
							<div class="form-group">															
								<input type="text" class="form-control" placeholder="Valor stro/reserva" id="VALOR_SINIESTRO_RESERVA'.$contador.'" name="VALOR_SINIESTRO_RESERVA['.$contador.']" alt="'.$contador.'">
							</div>
						</td>
						<td>
							<div class="form-group">															
								<input type="text" class="form-control" placeholder="Valor Indemnizado" id="VALOR_INDEMNIZADO'.$contador.'" name="VALOR_INDEMNIZADO['.$contador.']" alt="'.$contador.'" alt="'.$contador.'">
							</div>
						</td>
						<td>
							<div class="form-group">															
								<input type="text" class="form-control" placeholder="Deducible" id="DEDUCIBLE'.$contador.'" name="DEDUCIBLE['.$contador.']" alt="'.$contador.'">
							</div>
						</td>
					</tr>';
			$contador++;		
					
		}
		echo 	'<div class="table-responsive">
					<table class="table able">
						<tbody>
							<tr>
								<input type="hidden" name="maxAmp" id="maxAmp" value="'.$contador.'"/>
								<input type="hidden" name="maxAmpCont" id="maxAmpCont" value="1"/>
								<th>AMPARO AFECTADO</th>
								<th>Valor stro/reserva</th>
								<th>Valor Indemnizado</th>
								<th>Deducible</th>										
							</tr>
						</tr>
						<tr>'.$menu.'</tr>
					<tbody>
				</table>';
?>