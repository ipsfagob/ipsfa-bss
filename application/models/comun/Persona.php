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
	var $__DBSaman = NULL;

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
		if (! isset ( $this->__DBSaman )) {
			$this->__DBSaman = $this->load->database('saman', true);
		}

	}

	/**
	* Permite Mapear un objeto (personas) de la BD SAMAN
	*	@param string
	* @return Persona
	*/
	function mapear($cedula = NULL){
		$sConsulta = "SELECT * FROM personas WHERE codnip='$cedula' LIMIT 1";
		
		$this->oid = "";
	}

	function consultar($cedula = NULL){
		$sConsulta = "SELECT * FROM personas WHERE codnip='$cedula' LIMIT 1";
		$rs = $this->__DBSaman->query($sConsulta);


		/*
		if ($this -> __DBSaman -> _error_number() == 0) $rs = $resultado -> result();

    	$arr[] = array(
    		'err' => $this -> __DBSaman -> _error_number(), 
    		'msj' => $this -> __DBSaman -> _error_message(), 
    		'rs' => $rs,
    		'cant'=>$resultado -> num_rows());
    	*/



		foreach ($rs->result() as $clv => $val) {
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
		return TRUE; //$arr;
	}

	function nombreCompleto(){
		return $this->primerNombre . ' ' . $this->segundoNombre;
	}

	function apellidoCompleto(){
		return $this->primerApellido . ' ' . $this->segundoApellido;
	}
}
