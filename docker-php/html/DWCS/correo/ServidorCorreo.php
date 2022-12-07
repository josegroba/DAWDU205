<?php
require_once("Correo.php");
use PHPMailer\PHPMailer\PHPMailer;
require "vendor/autoload.php";
class ServidorCorreo{
    private $ipServidor;
    private $emailDestino;
    private $nombreDestino;
    private $puerto;
    private $mail;

    public function __construct($ipServidor="10.10.32.138",$emailDestino="jose@ejemplo.com",$nombreDestino="Jose",$puerto=25){
        $this->ipServidor=$ipServidor;
        $this->emailDestino=$emailDestino;
        $this->nombreDestino=$nombreDestino;
        $this->puerto=$puerto;
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();

        // cambiar a 0 para no ver mensajes de error
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = false;
        //$mail->SMTPSecure = "tls";
        $this->mail->Host = $this->ipServidor;
        $this->mail->Port = $this->puerto;

        // introducir usuario de google
        $this->mail->Username = "";
        // introducir clave
        $this->mail->Password = "";
        // destinatario
        $address = $this->emailDestino;
        $this->mail->AddAddress($address, $this->nombreDestino);
    }

    public function enviar(Correo $correo){
        // emisor
        $this->mail->SetFrom($correo->getEmailEmisor(),$correo->getNombreEmisor());
        // asunto
        $this->mail->Subject = $correo->getAsunto();
        // cuerpo
        $this->mail->MsgHTML ($correo->getMensaje());
        // adjuntos
        // $mail->addAttachment ("ejemplo.xxx");
        // enviar
        $resul = $this->mail->Send();
        if(!$resul) {
            return "Error". $this->mail->ErrorInfo;
        } else {
            return "Enviado con exito";
        }
    }
}

?>