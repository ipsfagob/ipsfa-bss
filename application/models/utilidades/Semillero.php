<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MamonSoft 
 *
 * Semillero
 * La semilla, simiente o pepita es cada uno de los cuerpos que forman 
 * parte del fruto que da origen a una nueva planta; es la estructura mediante 
 * la cual realizan la propagación las plantas que por ello se llaman 
 * espermatofitas (plantas con semilla). 
 *
 * @package Mamonsoft
 * @subpackage Comun
 * @author Carlos Peña
 * @copyright	Derechos Reservados (c) 2014 - 2015, MamonSoft C.A.
 * @link		http://www.mamonsoft.com.ve
 * @since Version 1.0
 */
class Semillero extends CI_Model{


	/**
	* Clave principal autoincrementable
	*
	* @return integer
	*/
	var $oid = NULL;


	/**
	* Codigo generados automaticamente
	*
	* @return string
	*/
	var $codigo = '';

	/**
	* Tipo de Codigo en los casos (R: Reembolso |A: Apoyo |C: Carta Aval)
	*
	* @return string
	*/
	var $tipo = '';


	function __construct(){
		parent::__construct();
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}


	/**
	* Generar Codigo Unico
	*
	* @return string
	*/
	function generar($tipo = NULL){
		if(!isset($tipo)){
			$sConsulta = "SELECT max(oid) + 1 AS codigo,'-',1 FROM semillero LIMIT 1;";
			$rs = $this->db->query($sConsulta);
			foreach ($rs->result() as $clave => $valor) {
				$this->codigo = $valor->codigo;
			}
		}
		return $this->codigo;
	}

	/**
	* Obtener Codigo Automatico
	*
	* @return string
	*/
	function obtener($codigo){

	}

	/**
	* Salvar Codigo Automatico
	*
	* @return mixed
	*/
	function salvar(){
		$sConsulta = "INSERT INTO semillero (codigo,certi,tipo) SELECT max(oid) + 1 AS valor,'-',1 from semillero;";
		$this->db->query($sConsulta);
	}
	/**
	* Anular Codigo
	*
	* @param string
	* @return bool
	*/
	function anular($codigo){

		return TRUE;
	}

	/**
	* Eliminar Codigo Borrar completamente
	*
	* @param string
	* @return bool
	*/
	function eliminar($codigo){

		return TRUE;
	}


	function __destruct(){

	}
}