<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 *
 * @package ipsfa-bss\application\model
 * @subpackage comun
 * @author Carlos Peña
 * @copyright Derechos Reservados (c) 2015 - 2016, MamonSoft C.A.
 * @link http://www.mamonsoft.com.ve
 * @since version 1.0
 *
 */
class Dbipsfa extends CI_Model {
	
	var $__DBipsfa;
	
	var $err;
	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){
		parent::__construct();
		$this->__iniciarIpsfa();
	}

	/**
	*	Establecer Conexión a la Base de datos SAMAN
	*/
	function __iniciarIpsfa(){
		if (! isset ( $this->__DBipsfa )) {
			$this->__DBipsfa = $this->load->database('default', true);
		}
		return $this->__DBipsfa;
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
		if ( ! (@$rs = $this->__DBipsfa->query($consulta))){
			$this->err = $this->__DBipsfa->error();
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
		$this->__DBipsfa->insert($tabla, $datos);
	}


	/**
	* Permite Actualizar Datos por arreglos
	*
	* @param string
	* @return array
	*/
	function actualizarArreglo($tabla = '', $datos = array(), $donde = array()){
		$this->__DBipsfa->where($donde);
		$this->__DBipsfa->update($tabla, $datos);
	}
	function __destruct(){
		unset($this->__DBipsfa);
	}


}