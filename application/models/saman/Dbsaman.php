<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * IPSFA Bienestar y Seguridad Social 
 * 
 * Dbsaman 
 *
 *
 * @package ipsfa-bss\application\model
 * @subpackage saman
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 */
class Dbsaman extends CI_Model {
	
	var $__DB;
	
	var $err;
	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){
		parent::__construct();
		$this->__iniciarSaman();
	}

	/**
	*	Establecer Conexión a la Base de datos SAMAN
	*/
	function __iniciarSaman(){
		if (! isset ( $this->__DB )) {
			$this->__DB = $this->load->database('saman', true);
		}
		return $this->__DB;
	}

	/**
	* Permite Capturar Error y otros
	*
	* @param string
	* @return array
	*/
	function consultar($consulta){
		$this->err = array(
				'message' => 'Bien',
				'query' => $consulta
				);
		if ( ! (@$rs = $this->__DB->query($consulta))){
			$this->err = $this->__DB->error();
			$this->err['query'] = $consulta;		
			$this->err['code'] = 1;
			//En el caso de un error se genera $err['message']
		}else{
			$this->err['code'] = 0;
			$this->err['rs'] =  $rs->result();
		}
		return (object)$this->err;
	}
}