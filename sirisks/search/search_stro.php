<?php

	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

    $sql = "SELECT s.Id,

    CONCAT(s.RAMO)AS idRamo,
    CONCAT(s.RAMO)AS idRamo_hiden,
    CONCAT(f.nombre)as nameRamo,

    CONCAT(s.id_responsable)AS idResponsable,
    s.consecutivo, 
    s.vlrTotalStro,
    CONCAT(s.reembolso) AS idRecobroHidden,
    s.vlrreembolso,
    s.enviadoJurid,

    CONCAT(s.nitsol)AS idCliente, 
    CONCAT(o.Nombre,' ',o.Apellido)AS nameCliente,

    CONCAT(s.ASEGURADORA)AS idCompany, 
    CONCAT(i.Nombre)AS nameCompany,

    CONCAT(s.asumidoPor)AS idAsumidoHidden,
   
    s.p_beneficiario,

    CONCAT(b.IdBeneficiario)AS idAsegurado,
    CONCAT(b.Nombres)AS nameAsegurado,

    DATE_FORMAT(s.fecha_prescripcion,'%d/%m/%Y') as fechaPrescripcion,

    CONCAT(s.ZONA)AS sitioStro,

    CONCAT(s.DEPARTAMENTO)AS idDepartamento,
    CONCAT(d.Nombre)AS nameDepartamento,
    CONCAT(s.p_ciudad_siniestro)AS idCiudad,
    CONCAT(e.Nombre)AS nameCiudad,

    s.p_amparo_afectados,
    CONCAT(s.ACTIVOAFECTADO) AS NumInterno,
    s.TERCEROS_AFECTADOS,
    CONCAT(s.causa_siniestro) AS codigo_causa,
    s.tipo_causa,
    CONCAT(s.otra_causa)AS causaText,
    CONCAT(s.POLIZA)AS poliza,
    CONCAT(s.PLACA) placa,
    CONCAT(s.CLASE_DE_DANO_PERDIDA)AS causaText,
    s.BIEN_PERSONA_AFECTADA,
    s.RESERVA_PERDIDA_AMP,
    CONCAT(s.PROYECTO)AS idProyecto,
    s.inmovilizacion_vehi,
    s.experticio_tecn,
    s.vlr_experticio,
    CONCAT(p.centroCosto)AS nomCentroC,
    CONCAT(s.SINIESTRO)AS htmlDescripcion,

    CONCAT(s.HORA_SINIESTRO)AS timeStro,

    s.PRESCRIPCION,

    DATE_FORMAT(s.FECHA_SINIESTRO,'%d/%m/%Y') as dateStro,


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

    DATE_FORMAT(s.FECHA_AVISO_PRESENTADO_CLIENTE,'%d/%m/%Y') as dateClient,

    DATE_FORMAT(s.FECHA_AVISO_SEGURADORA,'%d/%m/%Y') as dateCompany,

    s.DECLARACION_HECHOS,
    CONCAT(s.ESTADO_SEGUIMIENTO_RISKS)AS htmlSeguimiento,
    CONCAT(z.lastSgm)AS htmlLastSeg,
    s.LESIONES_PERSONAL_PROPIO, 
    s.LESIONES_TERCEROS,
    DATE_FORMAT(s.FECHA_PAGO,'%d/%m/%Y') as fechaPago,
    CONCAT(s.TALLER)AS tallerReparacion,
    DATE_FORMAT(s.FECHA_INGRESO_TALLER,'%d/%m/%Y') as fechaIngresoTaller,
    s.TEL_TALLER,
    CONCAT(t.telefTaller)AS telTaller,
    CONCAT(s.RESPONSABLE_TALLER)AS respTaller, 

    CONCAT(s.ESTADO)AS idEstado,
    CONCAT(g.nombre)AS estateStro,

    s.SIEOINC,
    
    CONCAT(s.RESPONSABLE)AS idResponsablehidden,

    s.VALOR_INDEMNIZADO,
    s.DEDUCIBLE,
    DATE_FORMAT(s.FECHA_DOCUMENTACION,'%d/%m/%Y') as dateDocumentation,
    DATE_FORMAT(s.FECHA_LIMITE_PAGO,'%d/%m/%Y') as datePay,
    
    CONCAT(s.NUM_SINIESTRO)AS numStroCompany,


    s.CEDULA_IN,
    s.id_usuario,
    s.nitContratista,
    s.Update
    FROM cuadrosiniestros s


    LEFT JOIN estadodelsiniestro g on s.ESTADO = g.id 
    LEFT JOIN departamentos_colombia d on s.DEPARTAMENTO = d.Id 
    LEFT JOIN ciudad_colombia e on s.p_ciudad_siniestro = e.Id_Ciudad 
    LEFT JOIN ramossiniestros f on s.RAMO = f.id 
    LEFT JOIN companias i on s.ASEGURADORA = i.Id 
    LEFT JOIN solicitantes o on s.nitsol=o.NitSolicitante 
    LEFT JOIN conductores c on s.CEDULA_CONDUCTOR=c.IdConductor 
    LEFT JOIN beneficiarios_siniestro b on s.p_asegurado=b.IdBeneficiario  
    LEFT JOIN taller t on s.TALLER=t.idTaller 
    LEFT JOIN proyectos p on s.PROYECTO =p.IdProyecto 
    LEFT JOIN ajustadorxcompania a on s.AJUSTADOR =a.Id_Ajustador 
    LEFT JOIN responsableCompania r on s.OPERARIO_FUNCONARIO =r.idResponsable 
    LEFT JOIN seguimiento_stro z on z.Id_Siniestro =s.Id 
    WHERE s.Id='".$_POST['Id']."'";


	   /*Ejecutamos la query*/
     $stmt=$bd->ejecutar($sql);
     $row=$bd->obtener_fila($stmt,0);

	echo json_encode($row);
?>
