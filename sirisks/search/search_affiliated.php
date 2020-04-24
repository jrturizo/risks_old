<?php

	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

    $sql = "SELECT c.Identificacion, 
    CONCAT(c.Nombre) as Nombre_propietario,  
    c.Sexo, DATE_FORMAT(c.Fec_Nacim,'%d/%c/%Y') as Fec_Nacim , c.Direccion, 
    c.Cod_Departamento, CONCAT(d.Nombre) AS Nombre_Dept,
    c.Cod_Ciudad,  CONCAT(t.Nombre) AS Nombre_Ciudad,
    c.Tel_Fijo, c.Tel_Movil, c.Email, c.Cuenta_Bancaria, c.Ins_Runt, c.Experiencia, c.Licencia, 
    c.Cat_Licencia, DATE_FORMAT(c.Fec_VenciLicencia,'%d/%c/%Y') as Fec_VenciLicencia, 
    c.Eps,  CONCAT(s.Nombre) AS Nombre_Eps,
    c.Arl,  CONCAT(u.Nombre) AS Nombre_Arl,
    c.Afp,  CONCAT(v.Nombre) AS Nombre_Afp,
    c.Rh, c.num_caja, c.Fec_Ingreso_Vinc, c.Update_pro, c.Id_Cliente, c.Nit_Cliente, c.observaciones, c.Estado
     FROM propietario_clientes c 
     left join departamentos_colombia d on d.Id = c.Cod_Departamento
     left join ciudad_colombia t on t.Id_Ciudad = c.Cod_Ciudad 
     left join seguridad_social s on s.Codigo = c.Eps 
     left join seguridad_social u on u.Codigo = c.Arl 
     left join seguridad_social v on v.Codigo = c.Afp 
     WHERE c.Identificacion =  '".$_POST['data']."' ";


     /*Ejecutamos la query*/
     $stmt=$bd->ejecutar($sql);
     $row=$bd->obtener_fila($stmt,0);

	echo json_encode($row);