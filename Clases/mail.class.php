<?php

class mail {

  // singleton instance
  private static $instance;

  // private constructor function
  // to prevent external instantiation
  private __construct() { 
                          $this->setConexion();
						  $this->conectar();
                        }
  
   /*Método para establecer los parámetros de la conexión*/
     private function setConexion(){
                                    $this->SMTPAuthPHPmail =$conf->getSMTPAuthPHPmail;
									$this->SMTPSecurePHPmail =$conf->getSMTPSecurePHPmail;
									$this->HostPHPmail=$conf->getHostPHPmail;
									$this->PortPHPmail=$conf->getPortPHPmail;
									$this->UsernamePHPmail=$conf->getUsernamePHPmail;
									$this->PasswordPHPmail=$conf->getPasswordPHPmail;									
									}
  // getInstance method
  public static function getInstance() {

    if(!self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;

  }
  private function conectar(){
                                include("./class.phpmailer.php");
                                include("./class.smtp.php");
                                $mail = new PHPMailer();
								$mail->IsSMTP();
								$mail->SMTPAuth=$this->SMTPAuthPHPmail;
								$mail->SMTPSecure=$this->SMTPSecurePHPmail;
								$mail->Host=$this->HostPHPmail;
								$mail->Port=$this->PortPHPmail;
								$mail->Username=$this->UsernamePHPmail;
								$mail->Password=$this->PasswordPHPmail;	
                              }

  public function envio($remitente,$Name,$asuntoCliente,$mailText,$email,$tomador){
                            $mail->From = $remitente;
							$mail->FromName = $Name;
							$mail->Subject = $asuntoCliente;
							//$mail->AltBody = $mailText;
							$mail->MsgHTML($mailText);
							//$mail->AddAttachment("files/files.zip");
							//$mail->AddAttachment("files/img03.jpg");
                            $mail->AddAddress($email,$tomador);
							$mail->IsHTML(true);
							return $mail->Send();
                         }

}
?>