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
class Dbroraima extends CI_Model {
	
	var $__DB;
	
	var $err;
	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){
		parent::__construct();
		$this->__iniciarRoraima();
	}

	/**
	*	Establecer Conexión a la Base de datos SAMAN
	*/
	function __iniciarRoraima(){
		if (! isset ( $this->__DB )) {
			$this->__DB = $this->load->database('default', true);
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
				'query' => $consulta,
				'cant' => 0
				);
		if ( ! (@$rs = $this->__DB->query($consulta))){
			$this->err = $this->__DB->error();
			$this->err['query'] = $consulta;		
			$this->err['code'] = 1;
			$this->err['cant'] = 0;
			//En el caso de un error se genera $err['message']
		}else{
			$this->err['code'] = 0;
			$this->err['rs'] = array();

			if(is_object($rs)){
				$this->err['rs'] =  $rs->result();
				$this->err['cant'] =  $rs->num_rows();
			}
		}
		return (object)$this->err;
	}

	
	/**
	* Permite Insertar Datos por arreglos
	*
	* @param string
	* @return array
	*/
	function insertarArreglo($tabla, $datos){
		$this->__DB->insert($tabla, $datos);
	}


	/**
	* Permite Actualizar Datos por arreglos
	*
	* @param string
	* @return array
	*/
	function actualizarArreglo($tabla = '', $datos = array(), $donde = array()){
		$this->__DB->where($donde);
		$this->__DB->update($tabla, $datos);
	}
	function __destruct(){
		unset($this->__DB);
	}
}