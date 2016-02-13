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


	var $oid = '';
	
	var $cedula = '';

	var $nacionalidad = "";

	var $sexo = '';

	var $primerNombre = "";
	
	var $segundoNombre = "";
	
	var $segundoApellido = "";

	var $primerApellido = "";

	var $fechaNacimiento = "";

	var $correoElectronico = '';

	var $estadoCivil = '';

	var $direccion = '';

	var $codigoCelular = '';

	var $celular = '';

	var $codigoTelefono = '';

	var $telefono = '';

	var $banco = '';

	var $cuenta = '';

	function __construct(){
		parent::__construct();
		$this->load->model('saman/Dbsaman', 'Dbsaman');

	}



	/**
	* Permite Mapear un objeto (personas) de la BD SAMAN
	* @param string
	* @return Persona
	*/
	function mapear($cedula = NULL){
		return TRUE;
	}

	function consultar($cedula, $codigo = null){
		$arr = $this->Dbsaman->consultar($this->generarSelectPersonas($cedula,$codigo));

		if($arr->code == 0){
			foreach ($arr->rs as $clv => $val) {
				$this->oid = $val->nropersona;
				$this->nacionalidad = $val->tipnip;
				$this->cedula = $val->codnip;				
				$this->sexo = $val->sexocod;
				$this->estadoCivil = $val->edocivilnombre;
				$this->primerNombre = $val->nombreprimero;
				$this->segundoNombre = $val->nombresegundo;
				$this->primerApellido = $val->apellidoprimero;
				$this->segundoApellido = $val->apellidosegundo;
				$this->fechaNacimiento = $val->fechanacimiento;

				$this->correoElectronico = $val->email1;
				$this->direccion = $val->direccion1;

				$this->codigoTelefono = $val->telefonocodigoarea;
				$this->telefono = $val->telefononumero;

				$this->banco = $val->instfinannombre;
				$this->cuenta = $val->nrocuenta;
			}
		}
		return $arr;
	}

	function generarSelectPersonas($cedula, $codigo = null){
		$sConsulta = 'SELECT * FROM personas 
		LEFT JOIN telefono_correo ON personas.nropersona=telefono_correo.nropersona
		LEFT JOIN edo_civil ON personas.edocivilcod=edo_civil.edocivilcod
		LEFT JOIN direcciones ON personas.nropersona=direcciones.nropersona 
		LEFT JOIN pers_cta_bancarias ON personas.nropersona=pers_cta_bancarias.nropersona
		LEFT JOIN inst_financieras ON pers_cta_bancarias.instfinancod=inst_financieras.instfinancod ';
		if(!$codigo){
			$sConsulta .= 'WHERE personas.codnip=\'' . $cedula . '\' LIMIT 1';

		}else{
			$sConsulta .= 'WHERE personas.nropersona=' . $codigo . ' LIMIT 1';
		}
		
		return $sConsulta;
	}


	

	function nombreCompleto(){
		return strtoupper($this->primerNombre . ' ' . $this->segundoNombre);
	}

	function apellidoCompleto(){
		return strtoupper($this->primerApellido . ' ' . $this->segundoApellido);
	}

	function nombreApellidoCompleto(){
		return strtoupper($this->nombreCompleto() . ' ' . $this->apellidoCompleto());
	}

	function obtenerSexo(){
		if($this->sexo == 'M'){
			return 'MASCULINO';
		}else{
			return 'FEMENINO';
		}
	}
	/**
	* Actualizar Objeto Persona en las tablas 
	* Direccion | Telefonos | Correos
	* @var Persona
	* @return bool
	*/
	function actualizar(){

	}

	/**
	*
	*
	*/
	function __destruct(){
		unset($this->Persona);
	}

}
