<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Carrito de Compra
 *
 * @package mamonsoft
 * @subpackage comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 *
 */
class Persona extends CI_Model{
	
	/**
	*	Objeto de Conexión SAMAN
	*/
	$__DBSaman = NULL;

	$oid = NULL;
	
	$cedula = '';

	$primerNombre = "";
	
	$segundoNombre = "";
	
	$segundoApellido = "";

	$primerApellido = "";

	$fechaNacimiento = "";

	/**
	*	Listado de Dependientes
	*	@var Dependiente
	*/
	$dependientes = array();

	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){


	}

	/**
	*	Establecer Conexión a la Base de datos SAMAN
	*/
	function __iniciarSaman(){
		if($this->__DBSaman != NULL){

		}
	}

	/**
	* Permite Mapear un objeto (personas) de la BD SAMAN
	*	@param string
	* @return Persona
	*/
	function MapearSaman($cedula = NULL){
		$sConsulta = "SELECT * FROM persona WHERE codnip='$cedula' LIMIT 1";
		$rs = $this->cedula = "";
		$this->oid = "";
	}

}
