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


	var $oid = NULL;
	
	var $cedula = '';

	var $nacionalidad = "";

	var $primerNombre = "";
	
	var $segundoNombre = "";
	
	var $segundoApellido = "";

	var $primerApellido = "";

	var $fechaNacimiento = "";

	var $correoElectronico = '';

	var $direccion = '';

	var $celular = '';

	var $telefono = '';

	/**
	*	Listado de Dependientes
	*	@var Dependiente
	*/
	var $dependientes = array();

		/**
	*	Listado de Dependientes
	*	@var Dependiente
	*/
	var $solicitudes = array();

	/**
	*	Constructor de la Calse
	*
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('comun/Dbsaman', 'Dbsaman');		

	}



	/**
	* Permite Mapear un objeto (personas) de la BD SAMAN
	* @param string
	* @return Persona
	*/
	function mapear($cedula = NULL){
		$sConsulta = "SELECT * FROM personas WHERE codnip='$cedula' LIMIT 1";
		
		
		return TRUE;
	}


	/**
	* Consultar y Mapear un objeto (personas) de la BD SAMAN
	* @param string
	* @return Persona
	*/
	function consultar($cedula = NULL){
		$sConsulta = "SELECT * FROM personas WHERE codnip='$cedula' LIMIT 1";
		$arr = $this->Dbsaman->consultar($sConsulta);
		if($arr->code == 0){
			foreach ($arr->rs as $clv => $val) {
				$this->oid = $val->nropersona;
				$this->nacionalidad = $val->tipnip;
				$this->cedula = $val->codnip;				
				$this->primerNombre = $val->nombreprimero;
				$this->segundoNombre = $val->nombresegundo;
				$this->primerApellido = $val->apellidoprimero;
				$this->segundoApellido = $val->apellidosegundo;
				$this->fechaNacimiento = $val->fechanacimiento;
				$this->correoElectronico = $val->email1;
				$this->direccion = $val->paginaweb;					
			}
		}		

		return $arr;
	}

	function nombreCompleto(){
		return $this->primerNombre . ' ' . $this->segundoNombre;
	}

	function apellidoCompleto(){
		return $this->primerApellido . ' ' . $this->segundoApellido;
	}

	/**
	* Actualizar Objeto Persona en las tablas 
	*
	*/
	function actualizar(){

	}

	/**
	*
	*
	*/
	function __destruct(){

	}

}
