<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conf
 *
 * @author DAVINSON
 */
class Conf {
    //put your code here
   
    private $_db;
    static $_instance;
    private function __construct(){
                                    //require './clases/config.php';
                                    $host='localhost';
                                    //Usuario
                                    $user='root';
                                    //Password
                                    $password='2R3gS69ED40tNWxg4hnItn+RQu77qWNw9KiGjyf8QAs=';
                                     //Base de datos a utilizar
                                    $db='sirisks';
                                     // Dominio
                                    $domain = '';
                                    $this->_domain=$domain;
                                    $this->_userdb=$user;
                                    $this->_passdb=$password;
                                    $this->_hostdb=$host;
                                    $this->_db=$db;

                                    }
    private function __clone(){ }

    public static function getInstance(){
                                         if (!(self::$_instance instanceof self)){
                                                                                  self::$_instance=new self();
                                                                                  }
                                          return self::$_instance;

                                          }
    public function getUserDB(){
                                $var=$this->_userdb;
                                return $var;

                                }
    public function getHostDB(){
                                $var=$this->_hostdb;
                                return $var;

                                }
    public function getPassDB(){
                                 $var=$this->_passdb;
                                 return $var;

                                 }
    public function getDB(){
                            $var=$this->_db;
                            return $var;
                            
                            }
}
?>
