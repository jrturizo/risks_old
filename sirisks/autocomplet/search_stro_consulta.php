<?php
	error_reporting(0);
	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

     $sql = "SELECT s.Id,
        CONCAT(s.RAMO)AS idRamo,
        CONCAT(s.id_responsable)AS idResponsable,
        s.consecutivo, 
        s.vlrTotalStro,
        s.reembolso,
        s.vlrreembolso,
        s.enviadoJurid,
        CONCAT(s.nitsol)AS nitAsegurado, 
        CONCAT(o.Nombre,' ',o.Apellido)AS nombreAsegurado,
        CONCAT(s.ASEGURADORA)AS idCia, 
        s.asumidoPor,
        CONCAT(s.DEPARTAMENTO)AS idDepartamento,
        s.p_beneficiario,
        CONCAT(b.IdBeneficiario)AS nitBeneficiario,
        CONCAT(b.Nombres)AS nombreBeneficiario,
        DATE_FORMAT(s.fecha_prescripcion,'%d/%m/%Y') as fechaPrescripcion,
        CONCAT(s.ZONA)AS sitioSiniestro,
        CONCAT(s.p_ciudad_siniestro)AS idCiudad,
        s.p_amparo_afectados,
        CONCAT(s.ACTIVOAFECTADO) AS NumInterno,
        s.TERCEROS_AFECTADOS,
        CONCAT(s.causa_siniestro) AS codigo_causa,
        s.tipo_causa,
        CONCAT(s.otra_causa)AS causaText,
        CONCAT(s.POLIZA)AS poliza,
        CONCAT(s.PLACA) Placa,
        CONCAT(s.CLASE_DE_DANO_PERDIDA)AS causaText,
        s.BIEN_PERSONA_AFECTADA,
        s.RESERVA_PERDIDA_AMP,
        CONCAT(s.PROYECTO)AS idProyecto,
        s.inmovilizacion_vehi,
        s.experticio_tecn,
        s.vlr_experticio,
        CONCAT(p.centroCosto)AS nomCentroC,
        s.SINIESTRO,
        CONCAT(s.HORA_SINIESTRO)AS horaSiniestro,
        s.PRESCRIPCION,
        DATE_FORMAT(s.FECHA_SINIESTRO,'%d/%m/%Y') as fechaSiniestro,
        CONCAT(s.Presencia_transito)AS Presencia_transito,
        CONCAT(s.CEDULA_CONDUCTOR)AS Cedula,
        CONCAT(c.Conductor)AS Conductor,
        CONCAT(c.telConductor)AS telConductor,
        CONCAT(s.OPERARIO_FUNCONARIO) as respCia, 
        CONCAT(r.telefonoResponsable) as telRespCia, 
        s.TEL_OPERARIO, 
        s.TEL_AJUSTADOR,
		CONCAT(s.AJUSTADOR) as respAjustador,
		CONCAT(a.Telefono) as telAjuspCia,
        DATE_FORMAT(s.FECHA_VISITA_AJUSTADOR,'%d/%m/%Y') as fechVisiA,
        s.VALOR_SINIESTRO_RESERVA,
        DATE_FORMAT(s.FECHA_AVISO_PRESENTADO_CLIENTE,'%d/%m/%Y') as fechaCliente,
        DATE_FORMAT(s.FECHA_AVISO_SEGURADORA,'%d/%m/%Y') as fechaAseguradora,
        s.DECLARACION_HECHOS,
        CONCAT(s.ESTADO_SEGUIMIENTO_RISKS)AS html_Seguimineto,
        s.LESIONES_PERSONAL_PROPIO, 
        s.LESIONES_TERCEROS,
        DATE_FORMAT(s.FECHA_PAGO,'%d/%m/%Y') as fechaPago,
        CONCAT(s.TALLER)AS tallerReparacion,
        DATE_FORMAT(s.FECHA_INGRESO_TALLER,'%d/%m/%Y') as fechaIngresoTaller,
        s.TEL_TALLER,
        CONCAT(t.telefTaller)AS telTaller,
        CONCAT(s.RESPONSABLE_TALLER)AS respTaller, 
        CONCAT(s.ESTADO)AS estadoSiniestro,
        s.SIEOINC,
        s.RESPONSABLE,
        s.VALOR_INDEMNIZADO,
        s.DEDUCIBLE,
        DATE_FORMAT(s.FECHA_DOCUMENTACION,'%d/%m/%Y') as fechDocum,
        DATE_FORMAT(s.FECHA_LIMITE_PAGO,'%d/%m/%Y') as fechLimtPag,
        CONCAT(s.NUM_SINIESTRO)AS numStro,
        s.CEDULA_IN,
        s.id_usuario,
        s.nitContratista,
        s.Update
        FROM cuadrosiniestros s
        LEFT JOIN solicitantes o on s.nitsol=o.NitSolicitante 
        LEFT JOIN conductores c on s.CEDULA_CONDUCTOR=c.IdConductor 
        LEFT JOIN beneficiarios_siniestro b on s.p_asegurado=b.IdBeneficiario  
        LEFT JOIN taller t on s.TALLER=t.idTaller 
        LEFT JOIN proyectos p on s.PROYECTO =p.IdProyecto 
        LEFT JOIN ajustadorxcompania a on s.AJUSTADOR =a.Id_Ajustador 
        LEFT JOIN responsableCompania r on s.OPERARIO_FUNCONARIO =r.idResponsable 
        WHERE s.Id='".$_POST['Id']."'";
	
	/*Ejecutamos la query*/
    $stmt=$bd->ejecutar($sql);
    $row=$bd->obtener_fila($stmt,0);
 
	echo json_encode($row);
?>
