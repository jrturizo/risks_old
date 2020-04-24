<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author DAVINSON
 *
 */
class Db {
    //put your code here
     private $servidor;
     private $usuario;
     private $password;
     private $base_datos;
     private $link;
     private $stmt = '';
     private $array;
     static $_instance;
     
     /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
     private function __construct(){
                                    $this->setConexion();
                                    $this->conectar();
                                    }
    /*Método para establecer los parámetros de la conexión*/
     private function setConexion(){
                                    $conf = Conf::getInstance();
                                    $this->servidor=$conf->getHostDB();
                                    $this->base_datos=$conf->getDB();
                                    $this->usuario=$conf->getUserDB();
                                    $this->password=$conf->getPassDB();    
									}
    /*Evitamos el clonaje del objeto. Patrón Singleton*/
     private function __clone(){ }
     /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
     public static function getInstance(){
                                          if (!(self::$_instance instanceof self)){
                                                                                   self::$_instance=new self();
                                                                                   }
                                          return self::$_instance;
                                          }
     /*Realiza la conexión a la base de datos.*/

      private function conectar(){
                                   $this->link=mysql_connect($this->servidor, $this->usuario, $this->password);
                                   mysql_select_db($this->base_datos,$this->link);
                                   @mysql_query("SET NAMES 'utf8'");
                                  }

    /*Método para ejecutar una sentencia sql*/
    public function ejecutar($sql){
                                   $this->stmt = '';
                                   $this->stmt=mysql_query($sql,$this->link);
                                   return $this->stmt;

                                   }
  /**/
   public function menu($menu,$valor,$nombre){
                           $this->stmt = '<option value="">SELECCIONE UNA OPCION</option>';
                           $menu1 = mysql_query($menu,$this->link);
                           while ($row=mysql_fetch_array($menu1)){
                              $val = $row[$valor];
                              $nom = $row[$nombre];
                             $this->stmt .='<option value="'.$val.'">'.$nom.'</option>';
							 
                               }
                            return $this->stmt;
   }
   
   public function menus($menu,$valor,$nombre){
                           $this->stmt = '<option value="">SELECCIONE</option>';
                           $menu1 = mysql_query($menu,$this->link);
                           while ($row=mysql_fetch_array($menu1)){
                              $val = $row[$valor];
                              $nom = $row[$nombre];
                             $this->stmt .='<option value="'.$val.'">'.$nom.'</option>';
							 
                               }
                            return $this->stmt;
   }


   /*Método para insertar*/
   public function insertar($tabla,$campos,$variable){
                             $this->stmt = '';
                             $sqlinsertar = "INSERT INTO ".$tabla." (".$campos.") VALUES (".$variable.")";
                  
                             return $this->stmt=@mysql_query($sqlinsertar,$this->link);
							  
                              }

   /*Método para Actualizar*/
   public function actualizar($tabla,$campavariable,$condicion)
							{
                                $this->stmt = '';
                                 $sqlactualizar = 'UPDATE '.$tabla.' '.' Set '.$campavariable.'  Where '.$condicion;
                                return $this->stmt=@mysql_query($sqlactualizar,$this->link);
                               }

   public function eliminar($tabla,$variable){
                              $this->stmt = '';
                              $sqleliminar = 'DELETE FROM '.$tabla.'  Where '.$variable;
                              return $this->stmt=mysql_query($sqleliminar,$this->link);
                             }
   public function menuli($menu,$valor,$nombre,$clase){
                           $this->stmt = '';
                           $menu1 = mysql_query($menu,$this->link);
                           while ($row=mysql_fetch_array($menu1)){
                              $val = $row[$valor];
                              $nom = $row[$nombre];
                             $this->stmt .='<li class="'.$clase.'"><a href="../zonaold.php?Perfil='.$val.'">'.$nom.'</a></li>';
                               }
                            return $this->stmt;
   }


   /*Método para obtener una fila de resultados de la sentencia sql*/
   public function obtener_fila($stmt,$fila){
                                             if ($fila==0){
                                                           $this->array=mysql_fetch_array($stmt);

                                                           }else{
                                                                  mysql_data_seek($stmt,$fila);
                                                                  $this->array=mysql_fetch_array($stmt);
                                                                  }       return $this->array;

                                            }
   /*Devuelve el último id del insert introducido*/
   public function lastID(){
                         
                            return mysql_insert_id($this->link);
                            
                            }

  

}
?>
