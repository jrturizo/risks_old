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
class ConfPHPmail {
    //put your code here
   
    private $_Username;
    static $_instance;
    private function __construct(){
                                    $SMTPAuth = true;
									$SMTPSecure = "ssl";
									$Host = "smtp.gmail.com";
									$Port = 465;
									$Username = "autos.risks@gmail.com";
									$Password = "71277483";

									$this->_SMTPAuthPHPmail = $SMTPAuth;
									$this->_SMTPSecurePHPmail = $SMTPSecure;
									$this->_HostPHPmail = $Host;
									$this->_PortPHPmail = $Port;
									$this->_UsernamePHPmail = $Username;
									$this->_PasswordPHPmail = $Password;
                                    

                                    }
    private function __clone(){ }

    public static function getInstance(){
                                         if (!(self::$_instance instanceof self)){
                                                                                  self::$_instance=new self();
                                                                                  }
                                          return self::$_instance;

                                          }
    public function getSMTPAuthPHPmail(){
                                $var=$this->_SMTPAuthPHPmail;
                                return $var;

                                }
								
    public function getSMTPSecurePHPmail(){
                                $var=$this->_SMTPSecurePHPmail;
                                return $var;

                                }
								
    public function getHostPHPmail(){
                                 $var=$this->_HostPHPmail;
                                 return $var;

                                 }
								 
    public function getPortPHPmail(){
                            $var=$this->_PortPHPmail;
                            return $var;
                            
                            }
							
	public function getUsernamePHPmail(){
                            $var=$this->_UsernamePHPmail;
                            return $var;
                            
                            }
							
	public function getPasswordPHPmail(){
                            $var=$this->_PasswordPHPmail;
                            return $var;
                            
                            }
}
?>
