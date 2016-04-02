<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Correo Electronico
 *
 * @package ipsfa-bss\application\model
 * @subpackage utilidad
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */


class Correo extends CI_Model{

	var $__SISTEM = NULL;

	/**
	* Contenido del Correo
	*	
	* @var string
	*/
	var $cuerpo = '';

	/**
	* Direccion del Destinatario de Correo
	*	
	* @var string
	*/
	var $para = '';

	/**
	* Titulo de la Gerencia que enviara el Correo
	*	
	* @var string
	*/
	var $gerencia = '';

	var $titulo = '';
	
	function __construct(){
		parent::__construct();
		
	}

	/**
	* Enviar Correo Electronico
	*
	* @access public
	* @return string
	**/
	function enviar(){
		require_once('application/libraries/PHPMail/class.phpmailer.php');
 		$mail = new PHPMailer();
        $body                ='';
        $mail->IsSMTP(); 							  // telling the class to use SMTP
        $mail->SMTPDebug  = 1;						  //
        $mail->Host          = "smtp.gmail.com";      //
        $mail->SMTPSecure = "tls";					  //
        $mail->SMTPAuth      = true;                  // enable SMTP authentication
        $mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent

        $mail->Port          = 587;
        $mail->Username      = "ipsfanet.noresponder@gmail.com"; // SMTP account username
        $mail->Password      = "za63qj2p";        // SMTP account password
        $mail->SetFrom('ipsfanet.noresponder@gmail.com', $this->gerencia);
        $mail->AddReplyTo('ipsfanet.noresponder@gmail.com', $this->gerencia);
        $mail->Subject = 'Ipsfa En Linea';

        

        $mail->AltBody    = "Texto Alternativo"; // optional, comment out and test
        $mail->MsgHTML($this->cuerpo);
        $mail->AddAddress($this->para, $this->titulo);
        if(!$mail->Send()) {
            return "Error al enviar: " . $mail->ErrorInfo;
        } else {
            return "Mensaje enviado a:  !";
        }
	}

	function __destruct(){

	}


}